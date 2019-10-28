<?php
    require_once "../../helpers/config.php";
?>

<?php
    ## Read value (These All Are Attributes passed by jQuery DATATABLES )
    $draw = $_POST['draw'];
    $rowNumb = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value

    $searchArray = array();

    ## Search Query (Writing Query For Search)
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " AND (title LIKE :title or 
                fullName LIKE :fullName) ";
        $searchArray = array( 
                'title'=>"%$searchValue%", 
                'fullName'=>"%$searchValue%");
    }

    ## Total number of records without filtering
    $stmt = $db -> prepare("SELECT COUNT(*) AS allcount FROM content LEFT JOIN users ON content.user_id = users.id");
    $stmt -> execute();
    $records = $stmt -> fetch();
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $stmt = $db -> prepare("SELECT COUNT(*) AS allcount FROM content LEFT JOIN users ON content.user_id = users.id WHERE 1 ".$searchQuery);
    $stmt -> execute($searchArray);
    $records = $stmt -> fetch();
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $stmt = $db -> prepare("SELECT a.*, b.id as userId, b.fullName FROM content a LEFT JOIN users b ON a.user_id = b.id WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

    // Bind values
    foreach($searchArray as $key => $search){
        $stmt -> bindValue(':'.$key, $search,PDO::PARAM_STR);
    }

    $stmt -> bindValue(':limit', (int)$rowNumb, PDO::PARAM_INT);
    $stmt -> bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
    $stmt -> execute();
    $contentList = $stmt->fetchAll();

    $data = array();

    foreach($contentList as $row){
        $data[] = array(
            "id" => $row['id'],
            "title" => $row['title'],
            "caption" => $row['caption'],
            "imageUrl" => $row['imageUrl'],
            "fullName" => $row['fullName'],
            "date_added" => $row['date_added'],
        );
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
?>

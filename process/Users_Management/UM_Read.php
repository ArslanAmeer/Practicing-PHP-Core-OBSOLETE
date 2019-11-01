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
        $searchQuery = " AND (fullName LIKE :fullName or 
                email LIKE :email) ";
        $searchArray = array( 
                'fullName'=>"%$searchValue%", 
                'email'=>"%$searchValue%");
    }

    ## Total number of records without filtering
    $stmt = $db -> prepare("SELECT COUNT(*) AS allcount FROM users ");
    $stmt -> execute();
    $records = $stmt -> fetch();
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $stmt = $db -> prepare("SELECT COUNT(*) AS allcount FROM users WHERE 1 ".$searchQuery);
    $stmt -> execute($searchArray);
    $records = $stmt -> fetch();
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $stmt = $db -> prepare("SELECT * FROM users WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

    // Bind values
    foreach($searchArray as $key => $search){
        $stmt -> bindValue(':'.$key, $search,PDO::PARAM_STR);
    }

    $stmt -> bindValue(':limit', (int)$rowNumb, PDO::PARAM_INT);
    $stmt -> bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
    $stmt -> execute();
    $empRecords = $stmt->fetchAll();

    $data = array();

    foreach($empRecords as $row){
        $data[] = array(
            "id" => $row['id'],
            "fullName" => $row['fullName'],
            "email" => $row['email'],
            "roleId" => $row['roleId'] == 1 ? 'Admin':'Guest',
            "joining_date" => $row['joining_date'],
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

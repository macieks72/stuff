
<?php
// foreach(PDO::getAvailableDrivers() as $driver) {
//   echo $driver.'<br />';
// }

try {
    $db = new PDO("firebird:dbname=localhost:/var/lib/firebird/3.0/data/employee.fdb", "maciek", "maciek");

    //$sql = 'SELECT COUNTRY from COUNTRY';
    $sql = 'SELECT * from CUSTOMER';

    $rows = $db->query($sql, PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        print_r($row);
    }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
}

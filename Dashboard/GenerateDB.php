<?php
    include('..\DBConn.php');
    /* Pagination for number of record on table */
    // Calculate total number of records
    $countQuery = "SELECT COUNT(*) AS total FROM `staffattendance`";
    $countResult = mysqli_query($conn, $countQuery);
    $totalRecords = mysqli_fetch_assoc($countResult)['total'];
    // Calculate total number of pages
    $recordsPerPage = 10;
    $totalPages = ceil($totalRecords / $recordsPerPage);
    // Determine current page number
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $recordsPerPage;
    $updateResult = '';
    
    // Define $selectedMonth with a default value
    $selectedMonth = isset($_POST['month']) ? $_POST['month'] : 1;
    
    // Handle form submission
    if(isset($_POST['generate'])) 
    {
        $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
    } 
    else 
    {
        // Select all data from DB and display on table with Descending Order(DESC)
        $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Display all data from Table and display on webpage table for Admin Dashboard
    while ($row = mysqli_fetch_assoc($result))
    {
        // Explode dates string into an array
        $dates = explode(' & ', $row['Date']);
        
        // Flag to indicate if this record should be displayed
        $displayRecord = false;
        
        // Iterate through each date and check if it falls in the selected month
        foreach ($dates as $date) 
        {
            // Convert the date string into a DateTime object
            $dateTime = DateTime::createFromFormat('d/m/Y', $date);
            
            // Check if the date falls in the selected month
            if ($dateTime !== false && $dateTime->format('m') == $selectedMonth) 
            {
                $displayRecord = true;
                break;
            }
        }
        // Only display the record if one of the dates falls in the selected month
        if ($displayRecord) 
        {
            ?>
            <tr align="center">
                <td><?php echo $row['StaffName']; ?></td>
                <td><?php echo $row['Class']; ?></td>
                <td>
                <?php 
                // Explode dates string into an array
                $dates = explode(' & ', $row['Date']);
                
                // Iterate through each date and format it accordingly
                foreach ($dates as $date) 
                {
                    $timestamp = strtotime(str_replace('/', '-', $date));
                    if ($timestamp !== false) 
                    {
                        echo date('d/m/Y', $timestamp) . '<br>';
                    } 
                    else 
                    {
                        echo $date . '<br>';
                    }
                }
                ?>
            </td>
                <td>
                    <?php
                    if ($row['ReasonAbsence'] == 'Other' && isset($row['OtherReason'])) 
                    {
                        echo $row['OtherReason'];
                    } 
                    else 
                    {
                        echo $row['ReasonAbsence'];
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    // Explode replacement dates string into an array
                    $replacementDates = explode(' & ', $row['DateReplacementClass']);
                    
                    // Iterate through each replacement date and format it accordingly
                    foreach ($replacementDates as $date) 
                    {
                        $timestamp = strtotime(str_replace('/', '-', $date));
                        if ($timestamp !== false) {
                            echo date('d/m/Y', $timestamp) . '<br>';
                        } else {
                            echo $date . '<br>';
                        }
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
?>
<!-- Generate Report Form -->
<form method="post">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <label for="monthSelect" class="form-label">Select Month:</label>
            <select class="form-select" id="monthSelect" name="month">
                <?php
                $months = array(
                    1 => 'January',
                    2 => 'February',
                    3 => 'March',
                    4 => 'April',
                    5 => 'May',
                    6 => 'June',
                    7 => 'July',
                    8 => 'August',
                    9 => 'September',
                    10 => 'October',
                    11 => 'November',
                    12 => 'December'
                );
                foreach ($months as $value => $name) 
                {
                    $selected = ($value == $selectedMonth) ? 'selected' : '';
                    echo "<option value='$value' $selected>$name</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary mt-3" name="generate">Generate Report</button>
        </div>
    </div>
</form>

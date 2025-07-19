<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT Services Request/Problem Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .outer-table {
            width: 100%;
            border-collapse: collapse;
            /* margin-bottom: 20px; */
        }

        .outer-table td {
            vertical-align: top;
            border: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 7px;
            text-align: center;
        }
        th {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        .inner-table td {
            border: 1px solid black;
        }
        .judul{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow';
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
        }
        img{
            width: 120px;
            
        }
    </style>
</head>

<body>
<div class="container" style="border: 2px solid #000;">
    <div class="container">
        <img src=<?= $logo ?> alt="logo">

        <div class="judul"><b>ICT SERVICES REQUEST/PROBLEM REPORT</b></div>

    </div>
    <div class="container">


        <table class="outer-table">
            <tr>
                <td>
                    <table class="inner-table">
                        <span style="text-align: left;"><b>I. Description Of Request</b> <span style="font-size: 8px;">/ Problem Experienced(Please
                            Specify date & time of occurrence for any problems experineced)</span></span>
                        <tr>
                            <td style="width: 90%; text-align: left;"><?php echo $rrinci->description?></td>
                            <td style="width: 10%; text-align: left;">Priority Levels <br>(<b>U</b>)rgent <br> (<b>N</b>)ormal <br>
                                (<b>L</b>)ow </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    

        <table class="outer-table">
            <tr>
                <td style="width: 50%;">

                    <p style="text-align: left;"><b>II. Requester/Reported By:</b></p>
                    <table class="inner-table">
                        <tr>
                            <td style="height:15px"><?php echo $rrinci->divisi?></td>
                            <td style="height:15px"><?php echo $rrinci->nama_pengguna?></td>
                            <td style="height:15px"><?php echo $rrinci->date_request?></td>
                            <td style="height:15px"><?php echo $rrinci->time?></td>
                        </tr>
                        <tr>
                            <th>Division</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </table>
                </td>

                <td style="width: 50%;">

                    <p style="text-align: left;">Approved By: (For new installations/software loan)</p>
                    <table class="inner-table">
                        <tr>
                            <td style="width: 10%; height:15px"><?php if($rriinciip):?><?php echo $rriinciip->nama_pengguna?><?php endif?></td>
                            <td style="height:15px"><?php if($rriinciip):?><?php echo $rriinciip->divisi?><?php endif?></td>
                            <td style="height:15px"><?php if($rriinciip):?><?php echo $rriinciip->date_approve?><?php endif?></td>
                            <td style="height:15px"><?php if($rriinciip):?><?php echo $rriinciip->status?><?php endif?></td>
                        </tr>
                        <tr>

                            <th>Name</th>
                            <th>Position</th>
                            <th>Date</th>
                            <th>Signature</th>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    
        <table class="outer-table">
            <span style="text-align: left;"><b>III. IT Use Only</b></span><br>
            <p style="text-align: left; margin-left: 10px;"><b>Approved By: (note: Sr. Manager approval needed for new
                    equipment/software/tools)</b></p>
            <tr>
                <td>
                    <table class="inner-table">

                        <tr>
                            <td style="height:15px"></td>
                            <td style="height:15px; width:20%">ICT Coordinator or Sr. Manager</td>
                            <td style="height:15px"></td>
                            <td style="height:15px; width:30%"></td>
                            <td style="height:15px; width:30%"></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Date</th>
                            <th>Signature</th>
                            <th>Remarks (including OE if reuired)</th>

                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div class="container">
        <table class="outer-table">
            <tr>
                <td style="width: 50%;">
                    <table class="inner-table">
                        <tr>
                            <td style="height:15px; width:10%"></td>
                            <td style="height:15px; width:10%"><?php if($rrincip):?><?php echo $rrincip->assigned_user_name?><?php endif?></td>
                            <td style="height:15px; width:15%"><?php if($rrincip):?><?php echo $rrincip->date_assign?><?php endif?></td>
                            <td style="height:15px; width:15%"><?php if($rrincip):?><?php echo $rrincip->date_complete?><?php endif?></td>
                        </tr>
                        <tr>
                            <th>Received By</th>
                            <th>Assigned To</th>
                            <th>Date Assigned</th>
                            <th>Date Completed</th>

                        </tr>
                    </table>
                </td>
                <td style="width: 50%;">
                    <table class="inner-table">
                        <tr>
                            <td style="height: 15px; width:10%"></td>
                            <td style="height: 15px; width:20%"></td>
                            <td style="height: 15px; width:10%"></td>
                            <td style="height: 15px; width:10%"></td>
                        </tr>
                        <tr>
                            <th >Manpower Effort</th>
                            <th>Costs</th>
                            <th>Category* (A/I/N/S)</th>
                            <th>Problem Area</th>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div class="container">
        <table style=" width:95%; margin-left:15px " >
            <p style="text-align: left;"><b>Solution/Action Implemented/Analysis</b></p>
            <tr>
                <td style="width: 75%;" rowspan="2"><?php if($rrincip):?><?php echo $rrincip->solusi?> <?php endif?></td>
                <td style="width: 10%; height:15px" ></td>
            
            </tr>
            
            <tr>
                <th>Further Action by</th>
            </tr>
        </table>

        <table class="outer-table">

            <span style="text-align: left;"><b>IV. User Acceptance</b></span>
            <tr>
                <td>
                    <table class="inner-table">
                        <tr>
                            <td style="width: 15%;height:15px"></td>
                            <td style="width: 15%;height:15px"></td>
                            <td style="width: 70%;height:15px"></td>
                        </tr>
                        <tr>
                            <th>User/Signature</th>
                            <th>Date & Time</th>
                            <th>Remarks</th>

                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>

    <div class="container">
        <table class="outer-table" >
            <tr>
                <td>
                    <table class="inner-table" style="width: 75%; margin-left: 70px">
                        <tr>
                            <th style="width: 7%;">No</th>
                            <th style="width: 8%;">Item</th>
                            <th style="width: 15%;">Brand/Type</th>
                            <th style="width: 15%;"></th>
                            <th style="width: 10%;">QTY</th>
                            <th style="width: 25%;">Remarks</th>

                        </tr>
                        <tr>
                            <td rowspan="2">1</td>
                            <td style="text-align: left;">Cell Phone</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td rowspan="2"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">Hp No:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <!-- Next -->
                        <tr>
                            <td>2</td>
                            <td style="text-align: left;">Blackberry</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td style="text-align: left;">Notebook</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td style="text-align: left;">ext. Hardisk/Flashdisk</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td style="text-align: left;">Camera</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td style="text-align: left;">Others</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>


</body>


</html>
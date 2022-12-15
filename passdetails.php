<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <link rel="stylesheet" href="css/details.css">
        <script type="text/javascript" lang="javascript" src="js/details.js"></script>
    </head>
       
    <body>
        <h1>Pass Details</h1>
        <h3>Previous Pass Details</h3>
        <form action="dashboard.html" method="post">
            <div class="row">
                <div class="col-10">
                    <label for="tkno">Ticket Number</label>
                </div>
                <div class="col-90">
                    <input type="text" id="tkno" name="tkno" placeholder="Enter previous ticket number">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="class">Class</label>
                </div>
                <div class="col-90">
                            <select id="class" name="class" required>
                                <option disabled selected>Select class *</option>
                                <option>First</option>
                                <option>Second</option>
                            </select>
                        </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="endstation">Ending Station</label>
                </div>
                <div class="col-90">
                <input type="text" id="endstation" name="endstation" placeholder="Enter ending station">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="stdate">Start Date</label>
                </div>
                <div class="col-90">
                    <input type="date" id="stdate" name="stdate" maxlength="10" placeholder="Enter start date">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="enddate">End Date</label>
                </div>
                <div class="col-90">
                    <input type="date" id="enddate" name="enddate" maxlength="10" placeholder="Enter End date">
                </div>
            </div>
            <h3>Current Pass Details</h3>
            <div class="row">
                <div class="col-10">
                    <label for="endstation">End Station</label>
                </div>
                <div class="col-90">
                    <input type="text" id="endstation" name="endstation" placeholder="Enter End Station">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="period">Period</label>
                </div>
                <div class="col-90">
                            <select id="period" name="period" required>
                                <option disabled selected>Select duration *</option>
                                <option>Monthly</option>
                                <option>Quarterly</option>
                            </select>
                        </div>
            </div>
            
            <div class="row">
                <div class="col-10">
                    <label for="class">Class</label>
                </div>
                <div class="col-90">
                            <select id="class" name="class" required>
                                <option disabled selected>Select class *</option>
                                <option>First</option>
                                <option>Second</option>
                            </select>
                        </div>
            </div>
            
            
                
            </div><br>
            
            <div class="row">
                <input type="submit" value="Registered" name="submit">
            </div>  
        </form>
    </body>
</html>
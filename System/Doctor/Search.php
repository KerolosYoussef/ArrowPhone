<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['Doctor'])){
        include "../Class/Patient.php";
        include "../Class/Doctor.php";
        $DocID = $doc->getData($_SESSION['Doctor'])['ID'];
    ?>
        <script>
            function showSearch(){
                $.post("searchAjax.php",{search :document.getElementById("searchword").value,docID: document.getElementById("docid").value},function(data,status){
                    if(status=="success"){
                        document.getElementById("searchOutput").innerHTML = data;
                    }
                })
            }
        </script>
        <div class='userPage'>
            <h1>Doctor | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                    <div class='container'>
                        <div class='EditBox'>
                        <h5>Search by Name</h5>
                        <input type="text" id='searchword' name='search' class='form-control'>
                        <input id='docid' hidden type="text" value='<?php echo $DocID; ?>'>
                        <button onclick="showSearch()" type='submit' class="btn btn-info">Search</button>
                        </div>
                        <div id='searchOutput'></div>
                        </div>
                </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
<!-- Footer -->
<footer class="page-footer font-small blue">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://www.facebook.com/Kirolos.Yossef23" target='_blank'>SlowArrow</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<?php } 
    else {
        $helper->redirect("http://127.0.0.1/Hospital%20Mangement%20System/");
    }
    include $tpl . "footer.php"; 
    ?>
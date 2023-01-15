<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <?php
                                        $columnas = $info[0];
                                        for ($i=0;$i<count($columnas);$i++) {
                                            echo "<th>".$columnas[$i][0]."</th>";
                                        }
                                        ?>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

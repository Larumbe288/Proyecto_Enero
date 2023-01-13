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
                                        $i=0;
                                        foreach ($info as $key) {
                                            echo "<th>" . $key[0][0][0] . "</th>";
                                            $i=$i+1;
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

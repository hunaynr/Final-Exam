<div class="container-fluid bg-dark text-white" style="height: 601px;">
    <br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php if ($this->session->userdata('level') == "admin") : ?>
                <center>
                    <h2>Welcome <?= $this->session->userdata('level'); ?>!</h2>
                </center>
            <?php elseif ($this->session->userdata('level') == "user") : ?>
                <center>
                    <h2>Welcome <?= $this->session->userdata('level'); ?>!</h2>
                </center>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row mt-1">
        <div class="col-2"></div>
        <div class="col-8">

            <style>
                #list_abs tbody tr {
                    color: white;
                    background-color: #000000;
                }

                #list_abs thead tr {
                    color: white;
                    background-color: #000000;
                }

                .dataTables_length,
                .dataTables_filter,
                .dataTables_info,
                .dataTables_processing,
                .dataTables_paginate {
                    color: white !important;
                }

                a.paginate_button,
                a.paginate_active {
                    display: inline-block;
                    background-color: white;
                    padding: 2px 6px;
                    margin-left: 2px;
                    cursor: pointer;
                    *cursor: hand;
                }

                a.paginate_active {
                    background-color: transparent;
                    border: 1px solid white;
                }

                a.paginate_button_disabled {
                    color: #ffffff;
                }

                .paging_full_numbers a:active {
                    outline: none
                }

                .paging_full_numbers a:hover {
                    text-decoration: none;
                }

                div.dataTables_paginate span>a {
                    width: 15px;
                    text-align: center;
                }

                div.dataTables_info {
                    padding: 9px 6px 6px 6px;
                }
            </style>

            <table class="table table-striped table-dark" id="list_abs">
                <thead>
                    <th>
                        No Absen
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        NIM
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            15
                        </td>
                        <td>
                            Hunayn Risatayn
                        </td>
                        <td>
                            1841720148
                        </td>
                    </tr>
                    <tr>
                        <td>
                            23
                        </td>
                        <td>
                            Osa Mahanani Sihono
                        </td>
                        <td>
                            1841720066
                        </td>
                    </tr>
                </tbody>
            </table>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#list_abs').DataTable();
                });
            </script>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        </div>
        <div class="col-2"></div>
    </div>
</div>
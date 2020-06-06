                <footer>
                    Copyright &copy; 2020 <strong>Sistem Pakar Kesehatan</strong> - Made with <i class="fa fa-heart text-danger"></i> by <strong>Yona Hergalina</strong>
                </footer>
            </div>
        </div>
        <a href="javascript:void(0)" id="to-top"><i class="fa fa-chevron-up"></i></a>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo $basepath; ?>/assets/js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/plugins.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/main.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/buttons.flash.min.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/jszip.min.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/pdfmake.min.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/vfs_fonts.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo $basepath; ?>/assets/js/vendor/datatables/buttons.print.min.js"></script>
        <script>
            $('#usersAdminTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend : 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend : 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend : 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    }
                ]
            } );
            $('#analisaAdminTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend : 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend : 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend : 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    }
                ]
            } );
            $('#gejalaAdminTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend : 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend : 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend : 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }
                ]
            } );
            $('#penyakitAdminTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend : 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend : 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend : 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    }
                ]
            } );
            $('#gpAdminTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend : 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend : 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend : 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }
                ]
            } );
            $('#yakin').on('keyup', function(){
                if (this.value != '') {
                    var tidakyakin = 10-parseFloat(this.value);
                    $('#tidakyakin').val(Number(tidakyakin).toFixed(1));
                } else {
                    $('#tidakyakin').val('');
                }
            })
        </script>
    </body>
</html>
<?php $conn->close(); ?>
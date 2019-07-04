<?php $__env->startSection('content'); ?>
    <!--
    <form method="POST" action='/wall/write'>
        <?php echo csrf_field(); ?>
        <input type="text" name='message'>
        <input type="submit" value='write on the wall'>
    </form>
    -->

            <div class="custom-bar-chart">
                <div class="col-md-6">
                    <h3>
                        Wallet
                        <i style="color:red">
                        <?php if( Session::has('message') ): ?>
                            <?php echo e(Session::get('message')); ?>

                        <?php endif; ?>
                        </i>
                    </h3>

                </div>
                <div class="col-md-6">
                    <h3>
                        <a href="/wallet/write" class="btn btn-round btn-warning" style="float:right;margin-bottom:-10px;"><i class="fa fa-edit"></i> Add</a>
                        <br>
                    </h3>
                </div>
                <br><br><br>
                <!-- page start-->
                <div class="content-panel">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Method</th>
                                <th class="hidden-phone">Amount(€)</th>
                                <th class="hidden-phone">Description</th>
                                <th class="hidden-phone">Lieu</th>
                                <th class="hidden-phone">Date</th>
                                <th class="hidden-phone"> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $messages['wallets']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $message->type->id == 1 ): ?>
                                    <tr class="gradeX">
                                <?php else: ?>
                                    <tr class="gradeC">
                                 <?php endif; ?>
                                        <td><?php echo e($message->type->name); ?></td>
                                        <td><?php echo e($message->method->name); ?></td>
                                        <td>
                                            <?php if( $message->type->id == 2 || $message->type->id == 3 ): ?>
                                                -
                                            <?php endif; ?>
                                                <?php echo e($message->amount); ?>

                                        </td>
                                        <td><?php echo e($message->description); ?></td>
                                        <td><?php echo e($message->place); ?></td>
                                        <td><?php echo e($message->day); ?></td>
                                        <td>
                                            <a href="/wallet/write/<?php echo e($message->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="/wallet/delete/<?php echo e($message->id); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                                        </td>
                                    </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- page end-->
            </div>
            <!-- /row -->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript">
        /* Formating function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
            sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
            sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
            sOut += '</table>';

            return sOut;
        }

        $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = ' ';
            nCloneTd.className = "center";

            $('#hidden-table-info thead tr').each(function() {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            $('#hidden-table-info tbody tr').each(function() {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });

            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portefeuille', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/laravel/resources/views/Wallet/index.blade.php */ ?>
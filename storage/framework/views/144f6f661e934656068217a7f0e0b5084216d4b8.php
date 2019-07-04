<?php $__env->startSection('content'); ?>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Add</h4>
                <form
                        class="form-horizontal tasi-form"
                        method="POST"
                        <?php if(!isset($messages["data"][0])): ?>
                            action="/wallet/add"
                        <?php else: ?>
                            action="/wallet/update/<?php echo e($messages["data"][0]->id); ?>"
                        <?php endif; ?>
                >
                    <?php echo csrf_field(); ?>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Type</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="type" required>
                                <?php $__currentLoopData = $messages['types']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($messages["data"][0]) &&$message->id == $messages["data"][0]->id_type): ?>
                                            selected="selected"
                                            <?php endif; ?>
                                            value="<?php echo e($message->id); ?>">
                                        <?php echo e($message->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Method</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="method" required>
                                <?php $__currentLoopData = $messages['methods']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($messages["data"][0]) &&$message->id == $messages["data"][0]->id_type): ?>
                                            selected="selected"
                                            <?php endif; ?>
                                            value="<?php echo e($message->id); ?>">
                                        <?php echo e($message->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Amount</label>
                        <div class="col-lg-10">
                            <input type="number" step='0.01' class="form-control" id="inputError" name="amount" required
                            <?php if(isset($messages['data'][0])): ?>
                                value="<?php echo e($messages['data'][0]->amount); ?>"
                            <?php endif; ?>
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Description</label>
                        <div class="col-lg-10">
                            <input type="text" step='0.01' class="form-control" id="inputError" name="description" placeholder="option"
                                   <?php if(isset($messages['data'][0])): ?>
                                   value="<?php echo e($messages['data'][0]->description); ?>"
                                    <?php endif; ?>
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Place</label>
                        <div class="col-lg-10">
                            <input type="text" step='0.01' class="form-control" id="inputError" name="place" placeholder="option"
                                   <?php if(isset($messages['data'][0])): ?>
                                   value="<?php echo e($messages['data'][0]->place); ?>"
                                    <?php endif; ?>
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Date</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="inputError" name="date" required
                                   <?php if(isset($messages['data'][0])): ?>
                                   value="<? echo $messages['data'][0]->day ?>"
                                    <?php endif; ?>
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-warning">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <!--script for this page-->
    <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
    <!--custom switch-->
    <script src="lib/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="lib/jquery.tagsinput.js"></script>
    <!--custom checkbox & radio-->
    <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="lib/form-component.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portefeuille', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/laravel/resources/views/Wallet/write.blade.php */ ?>
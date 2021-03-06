<?php use Cake\Core\Configure; ?>
<?php $this->Html->addCrumb(__('System'));?>
<?= $this->Html->script('Slides/slide_ajax') ?>
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-cog fa-fw "></i>
            <?= __('System');?>
            <span> > <?= $this->Html->link(__('List of business'), ['action' => 'index'])?></span>
        </h1>
    </div>
</div>
<div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                <h2><h2><?= ($business->isNew())?__('Business add'):__('Business edit'); ?></h2></h2>
            </header>
            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?php $this->loadHelper('Form', ['templates' => 'Admin.bootstrap_form']); ?>
                    <?= $this->Form->create($business, ['id' => 'smart-form-register', 'class' => 'form-horizontal']) ?>
                    <fieldset>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Title') ?><span class="textred"> (*)</span></label>
                            <div class="col-md-9">
                                <?= $this->Form->input('title', ['required' => true, 'class'=>'form-control', 'required' => false, 'placeholder' => __('Title')]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?= __('Description') ?><span class="textred">(*)</span></label>
                            <div class="col-md-9">
                                <?= $this->Form->input('description', ['class'=>'form-control', 'required' => false, 'placeholder' => __('Description')]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo __('Image') ?><span class="textred">(*)</span></label>
                            <div class="col-md-9">
                                <div class="prevIcon">
                                    <?php
                                    foreach (explode(',', $business->imageUrl) as $image) {
                                        echo $this->Core->image('Businesses/'.$image, 64, 64, [], true, true);
                                    }
                                    ?>
                                </div>
                                <?= $this->Form->input('imageUrl', [
                                    'type' => 'file',
                                    'preview'=>'.prevIcon',
                                    'label' => false,
                                    'placeholder' => __('Avatar'), 'class'=>'form-control']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?=__('Order slide')?><span class="textred">(*)</span></label>
                            <div class="row col-md-6 form-inline">
                                <div class="inline-group col-md-4">
                                    <input type="hidden" value="" name="set_number_people">
                                    <label class="radio-inline" for="set_number_people-0">
                                        <?= $this->Form->radio('set_number_people',
                                            [
                                                ['value' => '0', 'text' => 'No Slide'],
                                            ],
                                            [
                                                'label' => ['class' => 'set_number_people-0'],
                                                'id' => 'set_number_people-0',
                                                'checked' => 'checked',
                                            ])
                                        ?>
                                    </label>
                                    <label class="radio-inline" for="set_number_people-1">
                                        <?= $this->Form->radio('set_number_people',
                                            [
                                                ['value' => '1', 'text' => 'Yes'],
                                            ],
                                            [
                                                'label' => ['class' => 'set_number_people-1'],
                                                'id' => 'set_number_people-1',
                                                'checked' => 'checked',
                                            ])
                                        ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $this->Form->input('Slides.display_order', [
                                        'type' => 'select',
                                        'label' => 'false',
                                        'options' => $slides,
                                        'default' => 0,
                                        'empty' => 'No',
                                        'class' => 'form-control',
                                    ])?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-11">
                                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
                                <?= $this->Form->button('<i class="fa fa-save"></i> '.__('Submit'), ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->
        </div>
        <!-- end widget -->
    </article>
    <!-- WIDGET END -->
</div>
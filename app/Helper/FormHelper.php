<?php

function form_hidden($name, $value = null)
{
    echo Form::hidden($name, $value);
}

function form_date($title, $name, $value = "", $class = "form-control", $placeholder = "")
{
    $value = ($value == "") ? date("Y-m-d") : $value;

    $placeholder = ($placeholder == "") ? $title : $placeholder;
    echo '<div class="form-group">';
    echo Form::label($title, $title, ["class" => "col-md-2 control-label"]);
    echo '<div class="col-md-10">';
    echo Form::date($name, $value, ['class' => $class, "placeholder" => $placeholder]);
    echo '</div>';
    echo '</div>';
}

function form_input($title, $name, $class = "form-control", $placeholder = "")
{
    $placeholder = ($placeholder == "") ? $title : $placeholder;
    echo '<div class="form-group">';
    echo Form::label($title, $title, ["class" => "col-md-2 control-label"]);
    echo '<div class="col-md-10">';
    echo Form::text($name, null, ["id" => $name, 'class' => $class, "placeholder" => $placeholder]);
    echo '<br/></div>';
    echo '</div>';
}

function form_selectbox($title, $name, $data = [])
{
    echo '<div class="form-group">';
    echo Form::label($title, $title, ["class" => "col-md-2 control-label"]);
    echo '<div class="col-md-10">';
    echo Form::select($name, [null => "Select " . $title] + $data, null, ["class" => "form-control"]);
    echo '<br/></div>';
    echo '</div>';
}

function form_password($title, $name, $class = "form-control", $check = "")
{
    echo '<div class="form-group">';
    echo Form::label($title, $title, ["class" => "col-md-2 control-label"]);
    echo '<div class="col-md-10">';
    echo Form::password($name, ['class' => $class, "placeholder" => $title]);
    echo '</div>';
    echo '</div>';
}

function form_textarea($name, $title, $class = "form-control")
{
    echo '<div class="form-group">';
    echo Form::label($title, $title, ["class" => "col-md-2 control-label"]);
    echo '<div class="col-md-10">';
    echo Form::textarea($name, null, ['rows' => '5', 'class' => $class, "placeholder" => $title]);
    echo '<br/></div>';
    echo '</div>';
}

function form_submit($title = "Save")
{
    ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                <ul class="list-inline list-unstyled">
                    <li>
                        <?php echo Form::submit($title, ['class' => 'btn btn-success']); ?>
                    </li>

                    <li style="float: right">

                        <a class="right btn btn-info" href="<?= url()->previous(); ?>">
                            Go Back
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}

function formSubmit($title = "Save", $class = "fa-user")
{
    ?>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn <?= $class; ?>"></i>
                <?= $title; ?>
            </button>
        </div>
    </div>
    <?php
}

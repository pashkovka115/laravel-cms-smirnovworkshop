<?php

namespace App\Included\Classes\Html;

class Input
{
    public static function radio(string $title, string $name, array $value_options, string $current_value)
    {
        ?>
      <div class="col-lg-12 col-md-12 col-12 mb-1">
        <div class="card">
          <div class="card-body my-card-body">
            <h5 class="card-title"><?= $title ?></h5>
            <div class="">
                <?php $i = 1;
                foreach ($value_options as $option => $value) { ?>
                  <input type="radio" name="<?= $name ?>" id="radio_<?= $name ?>_<?= $i ?>"
                         value="<?= $option ?>" <?= $option == $current_value ? " checked" : "" ?>>
                  <label for="radio_<?= $name ?>_<?= $i ?>"><?= $value ?></label><br>
                    <?php $i++;
                } ?>
            </div>
          </div>
        </div>
      </div>
        <?php
    }


    public static function __callStatic($name, $arguments)
    {
        $name = str_replace('_', '-', $name);
        $types = [
            'color',
            'date',
            'datetime',
            'datetime-local',
            'email',
            'hidden',
            'number',
            'password',
            'tel',
            'text',
            'time',
            'url',
            'week'
        ];
        if (in_array($name, $types)) {
            self::input(
                $name,
                isset($arguments[0]) ? $arguments[0] : '',
                isset($arguments[1]) ? $arguments[1] : '',
                isset($arguments[2]) ? $arguments[2] : '',
                isset($arguments[3]) ? $arguments[3] : '',
                isset($arguments[4]) ? $arguments[4] : '',
            );
        } else {
            throw new \Exception('Method "' . $name . '" not exists');
        }
    }


    public static function input(string $type, string $title, string $name, string $label, string $current_value, string $attributes = '')
    {
        ?>
      <tr>
        <td class="adm-detail-valign-top" width="40%"><?= $title ?></td>
        <td width="60%">
          <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $type ?>_<?= $name ?>"
                 value="<?= $current_value ?>" <?= $attributes ?>>
          <label for="<?= $type ?>_<?= $name ?>"><?= $label ?></label><br>
        </td>
      </tr>
        <?php
    }

}
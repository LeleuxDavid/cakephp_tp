<?= $this->Form->create($contact) ?>
<fieldset>
    <?php
        echo $this->Form->control('name');
        echo $this->Form->control('email');
        echo $this->Form->control('object');
        echo $this->Form->control('body');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

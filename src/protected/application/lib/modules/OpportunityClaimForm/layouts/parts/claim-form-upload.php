<?php 

use MapasCulturais\i;
$app = MapasCulturais\App::i();
$url = "";
$files = $entity->getFiles('formClaimUpload');

$template = '
<li id="file-{{id}}" class="objeto">
    <a href="{{url}}" rel="noopener noreferrer">{{description}}</a> 
        <a data-href="{{deleteUrl}}" data-target="#file-{{id}}" data-configm-message="Remover este arquivo?" class="delete-right delete hltip js-remove-item" data-hltip-classes="hltip-ajuda" title="Excluir arquivo">Excluir</a>
</li';
?>
<div id="claim-form" class="widget">
    <h3>Solicitar recurso</h3>
    <div style="margin:1em 0em; text-align: right;">
        <a class="add btn btn-default "  ng-click="editbox.open('form-claim', $event)" rel="noopener noreferrer"><?= i::_e('Formulário de recurso')?></a>
        <a class="add btn btn-default js-open-editbox hltip" data-target="#editbox-formClaimUpload-file" href="#"> <?= i::_e('Vincular arquivo')?></a>
    </div>
    
    <div id="editbox-formClaimUpload-file" class="js-editbox mc-left" title="<?= i::_e('Vincular aqruivo ao recurso')?>" data-submit-label="Enviar">
        <?php $this->ajaxUploader($entity, 'formClaimUpload', 'append', 'ul.js-formClaimUpload', $template, '', false, false, false)?>
    </div>

    <edit-box id="form-claim" position="left" title="<?php \MapasCulturais\i::_e("Formulário de recurso");?>" cancel-label="Cancelar" close-on-cancel="true">
        <div ng-controller="OpportunityClaimController">
            <p>
                <?php i::_e("Mensagem");?>:<br />
                <textarea ng-model="data.message" type="text" rows="5" cols="30" name="message"></textarea>
            </p>

            <p>
                <button class="js-submit-button opportunity-claim-form" ng-click="send(<?php echo $entity->id?>); form[<?php echo $entity->id?>] = false;">
                    <?php i::_e("Enviar");?>
                </button>
            </p>
        </div>
    </edit-box>

    <ul class="js-formClaimUpload">
        <?php if(is_array($files)):?>
            <?php foreach($files as $file): ?>
                <article id="file-<?php echo $file->id ?>" class="objeto <?php if($this->isEditable()) echo i::_e(' is-editable'); ?>" >
                    <h1><a href="<?php echo $file->url;?>" download><?php echo $file->description ? $file->description : $file->name;?></a></h1>
                
                </article>
            <?php endforeach;?>
        <?php endif;?>

    </div>
</div>
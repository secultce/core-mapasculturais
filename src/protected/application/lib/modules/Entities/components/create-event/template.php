 <?php 
use MapasCulturais\i;
 
$this->import('
    entity-field 
    entity-terms
    modal 
'); 
?>

<modal title="Criar Evento" classes="create-modal" button-label="Criar Evento" @open="createEntity()" @close="destroyEntity()">
    <template v-if="entity" #default>
        <label><?php i::_e('Crie um evento com informações básicas')?><br><?php i::_e('e de forma rápida')?></label>
        <div class="create-modal__fields">
            <entity-field :entity="entity" hide-required label=<?php i::esc_attr_e("Nome ou título")?>  prop="name"></entity-field>
            <entity-terms :entity="entity" :editable="true" :classes="areaClasses" taxonomy='linguagem' title="Linguagem cultural"></entity-terms>
            <small class="field__error" v-if="areaErrors">{{areaErrors.join(', ')}}</small>
            <entity-field :entity="entity" hide-required v-for="field in fields" :prop="field"></entity-field>
        </div>
    </template>
    <template #button="modal">
        <slot :modal="modal"></slot>
    </template>
    <template #actions="modal">
        <button class="button button--primary" @click="createPublic(modal)"><?php i::_e('Criar e Publicar')?></button>
        <button class="button button--solid-dark" @click="createDraft(modal)"><?php i::_e('Criar em Rascunho')?></button>
        <button class="button button--text button--text-del " @click="modal.close()"><?php i::_e('Cancelar')?></button>
    </template>
</modal>

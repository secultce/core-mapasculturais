<?php

/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    entity-field
    mc-confirm-button
    mc-alert
    mc-link
');
?>
<div :class="[{'col-12': !phase.isLastPhase}, {'opportunity-phase-publish-config-registration--published': phase.publishedRegistrations},'opportunity-phase-publish-config-registration']">
    
    <div :class="[{'grid-12': !tab=='registration' && phase.isLastPhase}, 'opportunity-phase-publish-config-registration__content' ]">
        <div v-if="phase.publishedRegistrations" class="published">
            <div class="col-4">
                <mc-confirm-button :message="text('despublicar')" @confirm="unpublishRegistration()">
                    <template #button="modal">
                        <button class="button button--text button--text-danger" @click="modal.open()">
                            <?= i::__("Despublicar") ?>
                        </button>
                    </template>
                </mc-confirm-button>
            </div>
        </div>
      
        <div v-if="!phase.publishedRegistrations" :class="[{'col-12 grid-12 opportunity-phase-publish-config-registration__lastphase': phase.isLastPhase}, {'col-12 grid-12': !phase.isLastPhase && tab!='registrations'}]">
            <!-- <entity-field v-if="!hideDatepicker" :entity="phase" prop="publishTimestamp" :autosave="300" :min="minDate" :max="maxDate" classes="col-4"></entity-field> -->
            <mc-alert v-if="!phase.publishedRegistrations && !phase.isLastPhase"  class="col-12" type="warning">
                <?= i::__('Fique atento! A publicação do resultado é opcional e só pode ser feita após o término da fase. <strong>Esta ação deixará público o nome e o número de inscrição das pessoas inscritas.</strong>') ?>
            </mc-alert>
            <div v-if="!phase.isLastPhase" :class="[{'col-4 opportunity-phase-publish-config-registration__left': !phase.isLastPhase}]">
                    <div v-if="hideDatepicker && phase.publishTimestamp" class="msgpub-date" :class="[{'col-4': !phase.isLastPhase},]">
                        <p class="bold" v-if="phase.autoPublish && hideCheckbox">
                            <?= sprintf(
                                i::__("O resultado será publicado automaticamente no dia %s às %s"),
                                "{{phase.publishTimestamp.date('2-digit year')}}",
                                "{{phase.publishTimestamp.time('2-digit')}}"
                            ) ?>
                        </p>
                        <p class="bold" v-else>
                            <?= sprintf(
                                i::__("O resultado será publicado no dia %s às %s"),
                                "{{phase.publishTimestamp.date('2-digit year')}}",
                                "{{phase.publishTimestamp.time('2-digit')}}"
                            ) ?>
                        </p>
                    </div>
                    <div v-else-if="hideCheckbox && phase.autoPublish" class="msg-auto-pub col-4">
                        <p class="bold"><?= i::__('O resultado será publicado automaticamente') ?></p>
                    </div>
                    <div v-else class="col-4">
                        <p class="bold"><?= i::__("A publicação do resultado é opcional.") ?></p>
                    </div>
            </div>
            <div class="opportunity-phase-publish-config-registration__unpublishedlast" :class="[{'col-6':!phase.isLastPhase}, {'col-12 grid-12' : phase.isLastPhase}]">
                <div v-if="tab=='registrations'" class="opportunity-phase-publish-config-registration__registrationList col-12">
                    <h5 class="bold col-12"><?= i::__("A lista de inscrições pode ser acessada utilizando o botão abaixo")?></h5>
                    <mc-link  :entity="phase" class="button button--primary button--icon" route="registrations" right-icon>
                        <h4 class="semibold"><?= i::__("Conferir lista de inscrições") ?></h4><mc-icon name="external"></mc-icon>
                    </mc-link>

                </div> 
                <div v-if="phase.isLastPhase" class="col-12 opportunity-phase-publish-config-registration__line"></div>
                
                <div v-if="phase.isLastPhase" :class="[{'col-12': phase.isLastPhase}]">
                        <div v-if="hideDatepicker && phase.publishTimestamp" class="msgpub-date" :class="[{'col-4': !phase.isLastPhase},]">
                            <p class="bold" v-if="phase.autoPublish && hideCheckbox">
                                <?= sprintf(
                                    i::__("O resultado será publicado automaticamente no dia %s às %s"),
                                    "{{phase.publishTimestamp.date('2-digit year')}}",
                                    "{{phase.publishTimestamp.time('2-digit')}}"
                                ) ?>
                            </p>
                            <p class="bold" v-else>
                                <?= sprintf(
                                    i::__("O resultado será publicado no dia %s às %s"),
                                    "{{phase.publishTimestamp.date('2-digit year')}}",
                                    "{{phase.publishTimestamp.time('2-digit')}}"
                                ) ?>
                            </p>
                        </div>
                        <div v-else-if="hideCheckbox && phase.autoPublish" class="msg-auto-pub col-4">
                            <p class="bold"><?= i::__('O resultado será publicado automaticamente') ?></p>
                        </div>
                        <div v-else class="col-4">
                            <p class="bold"><?= i::__("A publicação do resultado é opcional.") ?></p>
                        </div>
                </div>
                <div :class="[{'col-12 grid-12': !phase.isLastPhase}, {'opportunity-phase-publish-config-registration__unpublishlist col-6': phase.isLastPhase}]">
                    <div v-if="!hideButton" class="opportunity-phase-publish-config-registration__button " :class="{'col-6': !phase.isLastPhase}">
                        <mc-confirm-button  yes="Publicar Resultado" @confirm="publishRegistration()">
                            <template #button="modal">
                                <button :class="['button', 'button--primary', {'button--large col-6': !phase.isLastPhase}, {'disabled': !firstPhase.status >0}, {'button--bg': phase.isLastPhase}]" @click="modal.open()">
                                    <?= i::__("Publicar Resultados") ?>
                                </button>
                            </template>
                            <template #message="message">
                                <h3 class="bold"><?= i::__("Deseja publicar os resultados?")?></h3>
                                <p class="message"><strong>
                                    <?= i::__("Antes de publicar os resultados, verifique cuidadosamente se todas as inscrições foram avaliadas e aplicadas.") ?></strong>
                                    <?= i::__("Com essa ação o resultado da fase ficará público.")?>
                                </p>
                            </template> 
                        </mc-confirm-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
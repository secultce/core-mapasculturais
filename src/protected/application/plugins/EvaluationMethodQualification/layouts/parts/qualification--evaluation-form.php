<?php

use MapasCulturais\i;

$plugin = $app->plugins['EvaluationMethodQualification'];

$params = ['registration' => $entity, 'opportunity' => $opportunity];
?>
<?php $this->applyTemplateHook('evaluationForm.qualification', 'before', $params); ?>
<div ng-controller="QualificationEvaluationMethodFormController" class="qualification-evaluation-form">
    <?php $this->applyTemplateHook('evaluationForm.qualification', 'begin', $params); ?>
    <section ng-repeat="section in ::data.sections">
        <table>
            <tr>
                <th colspan="2">
                    {{section.name}}
                </th>
            </tr>

            <tr ng-repeat="cri in ::data.criteria" ng-if="cri.sid == section.id">
                <td>
                    <div>
                        <?php echo $plugin->step ?><label for="{{cri.id}}">
                        <div class="tooltip">
                            <i class="fa fa-info-circle"></i>
                            <div class="tooltiptext" ng-if="cri.description">{{cri.description}}</div>
                            <div class="tooltiptext">{{cri.name}}</div>
                        </div>
                            {{cri.name}}:
                        </label>
                    </div>
                </td>
                <td>
                    <select name="data[{{cri.id}}]" ng-model="evaluation[cri.id]">
                        <option ng-repeat="option in cri.options">{{option}}</option>
                    </select>
                </td>
            </tr>

            <tr class="subtotal">
                <td><?php i::_e('Resultado da seção') ?></td>
                <td ng-if="subtotalSection(section) == 'Habilitado'" class="approved">{{subtotalSection(section)}}</td>
                <td ng-if="subtotalSection(section) == 'Inabilitado'" class="repproved">{{subtotalSection(section)}}</td>
            </tr>
        </table>
    </section>
    <hr>
    <label>
        <?php i::_e('Observações') ?>
        <textarea name="data[obs]" ng-model="evaluation['obs']"></textarea>
    </label>
    <hr>

    <div class='total'>
        <?php i::_e('Status'); ?>:
        <strong ng-if="total() == 'Habilitado'" class="approved">{{total()}}</strong>
        <strong ng-if="total() == 'Inabilitado'" class="repproved">{{total()}}</strong><br>
    </div>
    <?php $this->applyTemplateHook('evaluationForm.qualification', 'end', $params); ?>
</div>
<?php $this->applyTemplateHook('evaluationForm.qualification', 'after', $params); ?>
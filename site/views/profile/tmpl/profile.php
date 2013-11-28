<!-- 
 * Copyright 2013 benjamincharlton.
 *
 * Licensed under the Charlton Disc Trust License (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *  http://www.binpress.com/license/view/l/1556fb36cdde3bbd81965401e9ebe417
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */-->

    <a href="<?php echo JRoute::_('index.php?option=com_OpenConnect&view=profile&layout=list'); ?>" class="btn pull-right"><i class="icon icon-chevron-left"></i> <?php echo JText::_('COM_OPENCONNECT_BACK'); ?></a>
    <h2 class="page-header"><?php echo $this->profile->name; ?></h2>
    <div class="row-fluid">
    <div class="span3">
    <img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($this->profile->email))); ?>?s=180" />
    </div>
    <div class="span9 well well-small">
    <dl class="dl-horizontal">
    <dt><?php echo JText::_('COM_OPENCONNECT_PROFILE_NAME'); ?></dt>
    <dd><?php echo $this->profile->name; ?></dd>
    <dt><?php echo JText::_('COM_OPENCONNECT_PROFILE_JOIN'); ?></dt>
    <dd><?php echo JHtml::_('date', $this->profile->registerDate, JText::_('DATE_FORMAT_LC3')); ?></dd>
    <dt><?php echo JText::_('COM_OPENCONNECT_PROFILE_BIO'); ?></dt>
    <dd><?php if(isset($this->profile->details['aboutme'])) echo $this->profile->details['aboutme']; ?></dd>
    </dl>
    </div>
    </div>
    <br />
    <div class="row-fluid">
    <div class="tabbable">
    <ul class="nav nav-tabs">
    <li class="active">
        <a href="#customerTab" data-toggle="tab"><?php echo JText::_('COM_OPENCONNECT_CUSTOMERS'); ?></a>
    </li>
        <li class="active">
        <a href="#patientlistTab" data-toggle="tab"><?php echo JText::_('COM_OPENCONNECT_PATIENTLIST'); ?></a>
    </li>
    <li>
        <a href="#reminderlistTab" data-toggle="tab"><?php echo JText::_('COM_OPENCONNECT_REMINDERLIST'); ?></a>
    </li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="customerTab">
    <?php if($this->profile->isMine) { ?>
    <a href="#newPatientModal" role="button" data-toggle="modal" class="btn pull-right"><i class="icon icon-pencil-2"></i> <?php echo JText::_('COM_OPENCONNECT_ADD_PATIENT'); ?></a>
    <?php } ?>
    <h2><?php echo JText::_('COM_OPENCONNECT_CUSTOMER'); ?></h2>
    <?php echo $this->_customerView->render(); ?>
    </div>
    <div class="tab-pane" id="patientlistTab">
    <h2><?php echo JText::_('COM_OPENCONNECT_PATIENTLIST'); ?></h2>
    <?php echo $this->_patientlistView->render(); ?>
    </div>
    <div class="tab-pane" id="reminderlistTab">
    <h2><?php echo JText::_('COM_OPENCONNECT_REMINDERLIST'); ?></h2>
    <?php echo $this->_reminderlistView->render(); ?>
    </div>
    </div>
    </div>
    </div>
    <?php echo $this->_addPatientView->render(); ?>


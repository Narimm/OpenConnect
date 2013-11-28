<!--/* 
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
 
<div class='media well well-small span6'>
    <a class='pull-left' href='<?php echo JRoute::_('index.php?option=com_OpenConnect&view=profile&layout=profile&id='.$this->profile->id); ?>'>
        <img class='img-rounded' src='http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($this->profile->email))); ?>?s=60' />
    </a>
    <div class="media-body">
        <h4 class='media-heading'><a href='<?php echo JRoute::_('index.php?option=com_OpenConnect&view=profile&layout=profile&profile_id='.$this->profile->id); ?>'><?php echo $this->profile->name; ?></a></h4>
        <p>
            <strong><?php echo JText::_('COM_OPENCONNECT_TOTAL PATIENTS'); ?></strong>: <?php echo $this->profile->totalPatients; ?>
        </p>
    </div>
</div>




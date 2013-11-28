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
<div id="newReminderModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="newReminderModal" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo JText::_('COM_OPENCONNECT_ADD_REMINDER'); ?></h3>
  </div>
  <div class="modal-body">
  <div class="row-fluid">
    <form id="reminderForm">
      <input class="span12" type="text" name="remindername" placeholder="<?php echo JText::_('COM_OPENCONNECT_REMINDERNAME'); ?>" />
      <label class="span12" title="<?php echo JText::_('COM_OPENCONNECT_REMINDERDUE'); ?>"><input type="datetime" name="reminderdue" /></label>
<!--      <textarea class="span12" placeholder="<?php echo JText::_('COM_OPENCONNECT_SUMMARY'); ?>" name="reminder" rows="10"></textarea>-->
      <input type="hidden" name="user_id" value="<?php echo $this->user->id; ?>" />
      <input type="hidden" name="view" value="reminder" />
      <input type="hidden" name="patient_id" value="<?php echo $this->book->patient_id; ?>" />
      <input type="hidden" name="model" value="reminder" />
      <input type="hidden" name="item" value="reminder" />
      <input type="hidden" name="table" value="reminder" />
    </form>
  </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('COM_OPENCONNECT_CLOSE'); ?></button>
    <button class="btn btn-primary" onclick="addReminder()"><?php echo JText::_('COM_OPENCONNECT_ADD'); ?></button>
  </div>
</div>

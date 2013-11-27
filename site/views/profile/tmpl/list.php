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
    <h2 class="page-header"><?php echo JText::_('COM_OPENCONNECT_PROFILES'); ?></h2>
    <div class="row-fluid">
    <?php for($i=0, $n = count($this->profiles);$i<$n;$i++) {
    $this->_profileListView->profile = $this->profiles[$i];
    echo $this->_profileListView->render();
    } ?>
    </div>

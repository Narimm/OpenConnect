/* 
 * Copyright 2013 benjamincharlton.
 *
 * Licensed under Charlton Disc Trust License (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.binpress.com/license/view/l/1556fb36cdde3bbd81965401e9ebe417
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
    //add a patient
    function addPatient()
{
    var patientInfo = {};
    jQuery("#patientForm :input").each(function(idx, ele) {
        patientInfo[jQuery(ele).attr('name')] = jQuery(ele).val();
    });

    jQuery.ajax({
        url: 'index.php?option=com_openconnect&controller=add&format=raw&tmpl=component',
        type: 'POST',
        data: patientInfo,
        dataType: 'JSON',
        success: function(data)
        {
            if (data.success) {
                jQuery("#patient-list").append(data.html);
                jQuery("#newpatientModal").modal('hide');
            } else {

            }
        }
    });
}


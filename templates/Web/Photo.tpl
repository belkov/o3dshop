<label class="form-lbl"><span class="label label-info">{$Field.Caption}</span>  {if $Field.TRUE}<em class="form-req">*</em>{/if}</label>	
<div class="fileupload fileupload-new" data-provides="fileupload" style="border-bottom: 1px solid #EEEEEE;padding-bottom: 10px;" padding-top: 10px;"">
                <div class="fileupload-new thumbnail" style="width: {$width}px; height: {$height}px; line-height: 20px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: {$width}px; max-height: {$height}px; line-height: 20px;"></div>
                <div>
                    <span class="btn btn-file"><span class="fileupload-new">Выберите фото</span><span class="fileupload-exists">Изменить</span><input type="file" name="{$Field.Text}" id="id_photo"></span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Удалить</a>
                </div>
              </div>
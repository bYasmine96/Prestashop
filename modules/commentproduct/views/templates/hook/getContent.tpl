{if isset($confirmation)} 
<div class="alert alert-success">
La configuration a bien ete mise a jour
</div>
{/if}

<form method="post" action="" class="defau1tForm form—horizontal">
<div class="pane'|">
<div class="pane'|—head'ing">
<div class="‘icon—cogs"></‘i>
La configuration de mon modu1e
</div>

<div class="form-wrapper">
<div class="form-group">
<label class="control-label c01-1g—3">Activer 1es notes :</label>
<div class="col—lg—9">
<img src="../img/admin/enabled.gif" alt="" />
<input type="radio" id="enable_grades_1" name="enable_grades" value="1" />
<label class="t" for="enable_grades_1">0ui</label>
<img src="../img/admin/disabled.gif" alt="" />
<input type="radio" id="enable_grades_0" name="enable_grades" value="0" checked />
<label class="t" for="enable_grades_0">Non</label>
</div>
</div>
<div class="form-group">
<label class="control—label col—lg—3">Activer 1es commentaires :</label>
<div class="co1—1g—9">
<img src="../img/admin/enabled.gif" alt="" />
<input type="radio" id="enable_comments_l" name="enable_comments" value="1" />
<label class="t" for="enable_comments_1">0ui</label>
<img src="../img/admin/disabled.gif" alt="" />
<input type="radio" id="enable_comments_0" name="enable_comments" value="0"
checked />
<label class="t" for="enable_comments_0">Non</label>
</div>
</div>
</div>
<div class="panel-footer">
<button class="btn btn-default pull-right" name="submit_mymodcomments_form"
value="1" type=”submit">
<i class="process—icon—save"></i> Enregistrer

</button
</div>
</div>
</form>


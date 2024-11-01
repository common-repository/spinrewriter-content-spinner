

<div class="grid spinrewriter">

<?php

if($this->data['api'] == "not set" || $this->data['email'] == "not set")
{
?>
<i style="display:block;">Spin Rewriter API key or email has not been set. You need to signup for SpinRewriter to get the API key.</i>

<div style="text-align: right;">

<a href="http://www.spinrewriter.com/?ref=d4d7"  class="button button-primary button-large">Signup</a>

</div>

<?php
}else{
?>
    <div class="unit span-grid">
    <label for="spinrewriter_action"></label>
<select class="" name="spinrewriter_action">
<option class="" value="api_quota">api quota</option>
<option class="" value="text_with_spintax">text with spintax</option>
<option class="" value="unique_variation" selected="selected">unique variation</option>
<option class="" value="unique_variation_from_spintax">unique variation from spintax</option>
</select>
</div>

<div class="unit span-grid">
    <label for="protected_terms">protected terms <i>(1 term per line)</i></label>

<textarea name="protected_terms">
</textarea>
</div>



<div class="unit span-grid">
    <label for="auto_protected_terms">auto protected terms</label>

<select class="" name="auto_protected_terms">
<option class="" value="true">true</option>
<option class="" value="false" selected="selected">false</option>
</select>
</div>
<div class="unit span-grid">
    <label for="confidence_level">confidence level</label>

<select class="" name="confidence_level">
<option class="" value="low">low</option>
<option class="" value="medium" selected="selected">medium</option>
<option class="" value="high">high</option>
</select>
</div>
<div class="unit span-grid">
    <label for="nested_spintax">nested spintax</label>

<select class="" name="nested_spintax">
<option class="" value="true">true</option>
<option class="" value="false" selected="selected">false</option>
</select>
</div>
<div class="unit span-grid">
    <label for="auto_sentences">auto sentences</label>

<select class="" name="auto_sentences">
<option class="" value="true">true</option>
<option class="" value="false" selected="selected">false</option>
</select>
</div>
<div class="unit span-grid">
    <label for="auto_paragraphs">auto paragraphs</label>

<select class="" name="auto_paragraphs">
<option class="" value="true">true</option>
<option class="" value="false" selected="selected">false</option>
</select>
</div>
<div class="unit span-grid">
    <label for="auto_new_paragraphs">auto new paragraphs</label>

<select class="" name="auto_new_paragraphs">
<option class="" value="true">true</option>
<option class="" value="false" selected="selected">false</option>
</select>
</div>
<div class="unit span-grid">
    <label for="auto_sentence_trees">auto sentence trees</label>

<select class="" name="auto_sentence_trees">
<option class="" value="true">true</option>
<option class="" value="false" selected="selected">false</option>
</select>
</div>
<div class="unit span-grid">
    <label for="use_only_synonyms">use only synonyms</label>

<select class="" name="use_only_synonyms">
<option class="" value="true">true</option>
<option class="" value="false" selected="selected">false</option>
</select>
</div>
<div class="clear"></div>
<div class="unit span-grid" style="margin-top:10px; text-align:right;">

<a href="#" class="submit-spinrewriter button button-primary button-large">Spin</a>
</div>
<?php
}
?>
</div>




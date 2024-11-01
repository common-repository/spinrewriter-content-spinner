    <div class="wrap">
 
     <?php screen_icon(); ?>
 
     <h2>Spin Rewriter WordPress Plugin</h2>      
     <form method="post" action="">
  <label for="spinrewriter_api">Spin Rewriter API key</label>

 <input type="text" name="spinrewriter_api" value="<?=$this->data['api'] ?>" name="spinrewriter_api">
 <label for="spinrewriter_email">Spin Rewriter Email</label>
  <input type="text" name="spinrewriter_email" value="<?=$this->data['email'] ?>" name="spinrewriter_email">

<p class="submit">
  <i style="display:block;">Dont have api credentials? Signup!</i>

    <a href="http://www.spinrewriter.com/?ref=d4d7" class="button button-primary">Sign Up </a>

  <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
  
  </p>
   
 
     </form>
  
  
  
  <table border="1" cellspacing="0" cellpadding="0" class="" style="width:100%;">
	<tbody><tr><th width="">POST Field Name</th><th width="">Note</th><th>Description</th></tr>

	<tr>
		<td><b>action</b></td>
		<td>
			<i>included with every request<br><br>possible values:<br>
			» <b>api_quota</b><br>
			» <b>text_with_spintax</b><br>
			» <b>unique_variation</b><br>
			» <b>unique_variation_from_spintax</b></i>
		</td>
		<td valign="top">
			The action that you're requesting from the Spin Rewriter server.<br>
			» <b>api_quota:</b> returns the number of made and remaining API calls for the 24-hour period<br>
			» <b>text_with_spintax:</b> returns the processed spun text with spintax<br>
			» <b>unique_variation:</b> returns a unique variation of processed given text<br>
			» <b>unique_variation_from_spintax:</b> returns a unique variation of already spun text
		</td>
	</tr>
	<tr>
		<td><b>text</b></td>
		<td><i>included with all "text_with_spintax",  "unique_variation" and "unique_variation_from_spintax" API requests</i></td>
		<td valign="top">Your original text that you wish to rewrite or spin. This text will be analyzed by our software, its meaning will be extracted, and 
		Spin Rewriter will rewrite it with synonyms for individual words and phrases.</td>
	</tr>
	<tr>
		<td><b>protected_terms</b></td>
		<td valign="top"><i>optional parameter<br><br>default: (empty)</i></td>
		<td valign="top">A list of keywords and key phrases that you do NOT want to spin. 
		One term per line, i.e. terms are separated by the "\n" (newline) character.</td>
	</tr>
	<tr>
		<td><b>auto_protected_terms</b></td>
		<td valign="top"><i>optional parameter<br><br>possible values:<br>
			» <b>false</b> &nbsp; (default)<br>
			» <b>true</b></i>
		</td>
		<td valign="top">Should Spin Rewriter automatically protect all Capitalized Words except for those in the title of your original text?</td>
	</tr>
	<tr>
		<td><b>confidence_level</b></td>
		<td><i>optional parameter<br><br>possible values:<br>
			» <b>low</b><br>
			» <b>medium</b> &nbsp; (default)<br>
			» <b>high</b></i>
		</td>
		<td valign="top">The confidence level of the One-Click Rewrite process.<br>
			» <b>low:</b> largest number of synonyms for various words and phrases, least readable unique variations of text<br>
			» <b>medium:</b> relatively reliable synonyms, usually well readable unique variations of text (default setting)<br>
			» <b>high:</b> only the most reliable synonyms, perfectly readable unique variations of text
		</td>
	</tr>
	<tr>
		<td><b>nested_spintax</b></td>
		<td valign="top"><i>optional parameter<br><br>possible values:<br>
			» <b>false</b> &nbsp; (default)<br>
			» <b>true</b></i>
		</td>
		<td valign="top">Should Spin Rewriter also spin single words inside already spun phrases?<br><br>If set to "true", the returned spun text might contain 2 levels of nested spinning syntax.</td>
	</tr>
	<tr>
		<td><b>auto_sentences</b></td>
		<td valign="top"><i>optional parameter<br><br>possible values:<br>
			» <b>false</b> &nbsp; (default)<br>
			» <b>true</b></i>
		</td>
		<td valign="top">Should Spin Rewriter spin complete sentences?<br><br>If set to "true", some sentences will be replaced with a (shorter) spun variation.</td>
	</tr>
	<tr>
		<td><b>auto_paragraphs</b></td>
		<td valign="top"><i>optional parameter<br><br>possible values:<br>
			» <b>false</b> &nbsp; (default)<br>
			» <b>true</b></i>
		</td>
		<td valign="top">Should Spin Rewriter spin entire paragraphs?<br><br>If set to "true", some paragraphs will be replaced with a (shorter) spun variation.</td>
	</tr>
	<tr>
		<td><b>auto_new_paragraphs</b></td>
		<td valign="top"><i>optional parameter<br><br>possible values:<br>
			» <b>false</b> &nbsp; (default)<br>
			» <b>true</b></i>
		</td>
		<td valign="top">Should Spin Rewriter automatically write additional paragraphs on its own?<br><br>If set to "true", the returned spun text will contain additional paragraphs.</td>
	</tr>
	<tr>
		<td><b>auto_sentence_trees</b></td>
		<td valign="top"><i>optional parameter<br><br>possible values:<br>
			» <b>false</b> &nbsp; (default)<br>
			» <b>true</b></i>
		</td>
		<td valign="top">Should Spin Rewriter automatically change the entire structure of phrases and sentences?<br><br>If set to "true", Spin Rewriter will change "If he is hungry, John eats." to "John eats if he is hungry." and "John eats and drinks." to "John drinks and eats."</td>
	</tr>
	<tr>
		<td><b>use_only_synonyms</b></td>
		<td valign="top"><i>optional parameter with "unique_variation" and "unique_variation_from_spintax" API requests<br><br>possible values:<br>
			» <b>false</b> &nbsp; (default)<br>
			» <b>true</b></i>
		</td>
		<td valign="top">Should Spin Rewriter use only synonyms of the original words instead of the original words themselves?<br><br>If set to "true", Spin Rewriter will never use any of the original words of phrases if there is a synonym available. This significantly improves the uniqueness of generated spun content.</td>
	</tr>
</tbody></table>

    
    </div>
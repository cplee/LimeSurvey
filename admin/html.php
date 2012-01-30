<?php
/*
<<<<<<< HEAD
 * LimeSurvey
 * Copyright (C) 2007 The LimeSurvey Project Team / Carsten Schmitz
 * All rights reserved.
 * License: GNU/GPL License v2 or later, see LICENSE.php
 * LimeSurvey is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 *
 * $Id$
 */

//Security Checked: POST, GET, SESSION, DB, REQUEST, returnglobal
=======
* LimeSurvey
* Copyright (C) 2007 The LimeSurvey Project Team / Carsten Schmitz
* All rights reserved.
* License: GNU/GPL License v2 or later, see LICENSE.php
* LimeSurvey is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*
* $Id$
*/
>>>>>>> refs/heads/stable_plus

//Ensure script is not run directly, avoid path disclosure
include_once("login_check.php");
if (isset($_POST['uid'])) {$postuserid=sanitize_int($_POST['uid']);}
if (isset($_POST['ugid'])) {$postusergroupid=sanitize_int($_POST['ugid']);}

if ($action == "personalsettings")
{

<<<<<<< HEAD
    // prepare data for the htmleditormode preference
    $edmod1='';
    $edmod2='';
    $edmod3='';
    $edmod4='';
    switch ($_SESSION['htmleditormode'])
    {
        case 'none':
            $edmod2="selected='selected'";
            break;
        case 'inline':
            $edmod3="selected='selected'";
            break;
        case 'popup':
            $edmod4="selected='selected'";
            break;
        default:
            $edmod1="selected='selected'";
            break;
    }
=======
	if($result->RecordCount() > 0) {
		$listsurveys= "<br /><table class='table2columns' "
		. "cellpadding='1' cellspacing='0' width='800'>
				  <tr>
				    <td height=\"22\" width='22'>&nbsp</td>
				    <td height=\"22\"><strong>".$clang->gT("Survey")."</strong></td>
				    <td><strong>".$clang->gT("Date Created")."</strong></td>
				    <td><strong>".$clang->gT("Access")."</strong></td>
				    <td><strong>".$clang->gT("Status")."</strong></td>
				    <td colspan=\"3\"><strong>".$clang->gT("Action")."</strong></td>
				    <td colspan=\"3\"><strong>".$clang->gT("Responses")."</strong></td>
				  </tr>" ; 
>>>>>>> refs/heads/limesurvey16

    $cssummary = "<div class='formheader'>"
    . "<strong>".$clang->gT("Your personal settings")."</strong>\n"
    . "</div>\n"
    . "<div>\n"
    . "<form action='{$scriptname}' id='personalsettings' method='post'>"
    . "<ul>\n";

    $sSavedLanguage=$connect->GetOne("select lang from ".db_table_name('users')." where uid={$_SESSION['loginID']}");

<<<<<<< HEAD
    // Current language
    $cssummary .=  "<li>\n"
    . "<label for='lang'>".$clang->gT("Interface language").":</label>\n"
    . "<select id='lang' name='lang'>\n";
    $cssummary .= "<option value='auto'";
    if ($sSavedLanguage == 'auto') {$cssummary .= " selected='selected'";}
    $cssummary .= ">".$clang->gT("(Autodetect)")."</option>\n";
    foreach (getlanguagedata(true) as $langkey=>$languagekind)
    {
        $cssummary .= "<option value='$langkey'";
        if ($langkey == $sSavedLanguage) {$cssummary .= " selected='selected'";}
        $cssummary .= ">".$languagekind['nativedescription']." - ".$languagekind['description']."</option>\n";
    }
    $cssummary .= "</select>\n"
    . "</li>\n";
=======
			if($rows['active']=="Y")
			{
				if ($rows['useexpiry']=='Y' && $rows['expires'] < date_shift(date("Y-m-d H:i:s"), "Y-m-d", $timeadjust))
				{
					$status=$clang->gT("Expired") ;
				} else {
					$status=$clang->gT("Active") ;
				}
				
				// Survey Responses - added by DLR
				$gnquery = "SELECT count(id) FROM ".db_table_name("survey_".$rows['sid']);
			    $gnresult = db_execute_num($gnquery);
				while ($gnrow = $gnresult->FetchRow())	     
                {
					$responses=$gnrow[0];
	            }
			}
			else $status =$clang->gT("Inactive") ;
>>>>>>> refs/heads/stable_plus

    // Current htmleditormode
    $cssummary .=  "<li>\n"
    . "<label for='htmleditormode'>".$clang->gT("HTML editor mode").":</label>\n"
    . "<select id='htmleditormode' name='htmleditormode'>\n"
    . "<option value='default' {$edmod1}>".$clang->gT("Default")."</option>\n"
    . "<option value='inline' {$edmod3}>".$clang->gT("Inline HTML editor")."</option>\n"
    . "<option value='popup' {$edmod4}>".$clang->gT("Popup HTML editor")."</option>\n"
    . "<option value='none' {$edmod2}>".$clang->gT("No HTML editor")."</option>\n";
    $cssummary .= "</select>\n"
    . "</li>\n";

    // Date format
    $cssummary .=  "<li>\n"
    . "<label for='dateformat'>".$clang->gT("Date format").":</label>\n"
    . "<select name='dateformat' id='dateformat'>\n";
    foreach (getDateFormatData() as $index=>$dateformatdata)
    {
        $cssummary.= "<option value='{$index}'";
        if ($index==$_SESSION['dateformat'])
        {
            $cssummary.= "selected='selected'";
        }

<<<<<<< HEAD
        $cssummary.= ">".$dateformatdata['dateformat'].'</option>';
    }
    $cssummary .= "</select>\n"
    . "</li>\n"
    . "</ul>\n"
    . "<p><input type='hidden' name='action' value='savepersonalsettings' /><input class='submit' type='submit' value='".$clang->gT("Save settings")
    ."' /></p></form></div>";
}
=======
			if ($rows['active']=="Y")
			{
				if ($rows['useexpiry']=='Y' && $rows['expires'] < date_shift(date("Y-m-d H:i:s"), "Y-m-d", $timeadjust))
				{
					$listsurveys .= "<td><img src='$imagefiles/expired.png' title='' "
					. "alt='".$clang->gT("This survey is active but expired.")."' align='left' width='20'"
					. "onmouseout=\"hideTooltip()\""
					. "onmouseover=\"showTooltip(event,'".$clang->gT("This survey is active but expired", "js")."');return false\" />\n";
				}
				else
				{
					if ($sidsecurity['activate_survey'])
					{
						$listsurveys .= "<td><a href=\"#\" onclick=\"window.open('$scriptname?action=deactivate&amp;sid={$rows['sid']}', '_top')\""
						. "onmouseout=\"hideTooltip()\""
						. "onmouseover=\"showTooltip(event,'".$clang->gT("De-activate this Survey", "js")."');return false\">"
						. "<img src='$imagefiles/active.png' name='DeactivateSurvey' "
						. "alt='".$clang->gT("De-activate this Survey")."'  border='0' hspace='0' align='left' width='20' /></a></td>\n";
					} else 
					{
						$listsurveys .= "<td><img src='$imagefiles/active.png' title='' "
						. "alt='".$clang->gT("This survey is currently active")."' align='left' border='0' hspace='0' align='left' width='20' "
						. "onmouseout=\"hideTooltip()\""
						. "onmouseover=\"showTooltip(event,'".$clang->gT("This survey is currently active", "js")."');return false\" /></td>\n";
					}
				}
			} else {
				if ($sidsecurity['activate_survey'])
				{
					$listsurveys .= "<td><a href=\"#\" onclick=\"window.open('$scriptname?action=activate&amp;sid={$rows['sid']}', '_top')\""
					. "onmouseout=\"hideTooltip()\""
					. "onmouseover=\"showTooltip(event,'".$clang->gT("Activate this Survey", "js")."');return false\">" .
					"<img src='$imagefiles/inactive.png' name='ActivateSurvey' title='' alt='".$clang->gT("Activate this Survey")."' border='0' hspace='0' align='left' width='20' /></a></td>\n" ;	
				} else 
				{
					$listsurveys .= "<td><img src='$imagefiles/inactive.png'"
					. "title='' alt='".$clang->gT("This survey is not currently active")."' border='0' hspace='0' align='left'"
					. "onmouseout=\"hideTooltip()\""
					. "onmouseover=\"showTooltip(event,'".$clang->gT("This survey is not currently active", "js")."');return false\" /></td>\n";
				}			
			}
			
			$listsurveys.="<td><a href='".$scriptname."?sid=".$rows['sid']."'>".$rows['surveyls_title']."</a></td>".
					    "<td>".$datecreated."</td>".
					    "<td>".$visibility."</td>" .
					    "<td>".$privacy."</td>" .
					    "<td>".$status."</td>";
>>>>>>> refs/heads/stable_plus


<<<<<<< HEAD
=======
		$listsurveys.="<tr bgcolor='#F8F8FF'>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan=\"8\">&nbsp;</td>".
		"</tr>";
		$listsurveys.="</table><br />" ;
	}
	else $listsurveys="<br /><strong> ".$clang->gT("No Surveys available - please create one.")." </strong><br /><br />" ;
}
>>>>>>> refs/heads/limesurvey16

if (isset($surveyid) && $surveyid &&
$action!='dataentry' && $action!='browse' && $action!='exportspss' &&
$action!='statistics' && $action!='importoldresponses' && $action!='exportr' &&
$action!='vvimport' && $action!='vvexport' && $action!='exportresults')
{
<<<<<<< HEAD
    if(bHasSurveyPermission($surveyid,'survey','read'))
    {
        $js_admin_includes[]='../scripts/jquery/jquery.coookie.js';
        $js_admin_includes[]='../scripts/jquery/superfish.js';
        $js_admin_includes[]='../scripts/jquery/hoverIntent.js';
        $js_admin_includes[]='scripts/surveytoolbar.js';
        $css_admin_includes[]= $homeurl."/styles/default/superfish.css";
        $baselang = GetBaseLanguageFromSurveyID($surveyid);
        $sumquery3 = "SELECT * FROM ".db_table_name('questions')." WHERE sid={$surveyid} AND parent_qid=0 AND language='".$baselang."'"; //Getting a count of questions for this survey
        $sumresult3 = $connect->Execute($sumquery3); //Checked
        $sumcount3 = $sumresult3->RecordCount();
        $sumquery6 = "SELECT count(*) FROM ".db_table_name('conditions')." as c, ".db_table_name('questions')." as q WHERE c.qid = q.qid AND q.sid=$surveyid"; //Getting a count of conditions for this survey
        $sumcount6 = $connect->GetOne($sumquery6); //Checked
        $sumquery2 = "SELECT * FROM ".db_table_name('groups')." WHERE sid={$surveyid} AND language='".$baselang."'"; //Getting a count of groups for this survey
        $sumresult2 = $connect->Execute($sumquery2); //Checked
        $sumcount2 = $sumresult2->RecordCount();
        $sumquery1 = "SELECT * FROM ".db_table_name('surveys')." inner join ".db_table_name('surveys_languagesettings')." on (surveyls_survey_id=sid and surveyls_language=language) WHERE sid=$surveyid"; //Getting data for this survey
        $sumresult1 = db_select_limit_assoc($sumquery1, 1) ; //Checked
        if ($sumresult1->RecordCount()==0){die('Invalid survey id');} //  if surveyid is invalid then die to prevent errors at a later time
        // Output starts here...
        $surveysummary = "";
=======
	//GET NUMBER OF SURVEYS
	$query = "SELECT sid FROM ".db_table_name('surveys');
	$result = $connect->Execute($query);
	$surveycount=$result->RecordCount();
	$query = "SELECT sid FROM ".db_table_name('surveys')." WHERE active='Y'";
	$result = $connect->Execute($query);
	$activesurveycount=$result->RecordCount();
	$query = "SELECT users_name FROM ".db_table_name('users');
	$result = $connect->Execute($query);
	$usercount = $result->RecordCount();
	$tablelist = $connect->MetaTables();
	foreach ($tablelist as $table)
	{
		$stlength=strlen($dbprefix).strlen("old");
		if (substr($table, 0, $stlength+strlen("_tokens")) == $dbprefix."old_tokens")
		{
			$oldtokenlist[]=$table;
		}
		elseif (substr($table, 0, strlen($dbprefix) + strlen("tokens")) == $dbprefix."tokens")
		{
			$tokenlist[]=$table;
		}
		elseif (substr($table, 0, $stlength) == $dbprefix."old")
		{
			$oldresultslist[]=$table;
		}
	}
	if(isset($oldresultslist) && is_array($oldresultslist))
	{$deactivatedsurveys=count($oldresultslist);} else {$deactivatedsurveys=0;}
	if(isset($oldtokenlist) && is_array($oldtokenlist))
	{$deactivatedtokens=count($oldtokenlist);} else {$deactivatedtokens=0;}
	if(isset($tokenlist) && is_array($tokenlist))
	{$activetokens=count($tokenlist);} else {$activetokens=0;}
	$cssummary = "<table><tr><td height='1'></td></tr></table>\n"
	. "<form action='$scriptname'>"
	. "<table class='table2columns'"
	. "cellpadding='1' cellspacing='0' width='600'>\n"
	. "\t<tr>\n"
	. "\t\t<td colspan='2' align='center' bgcolor='#F8F8FF'>\n"
	. "\t\t\t<strong>".$clang->gT("LimeSurvey System Summary")."</strong>\n"
	. "\t\t</td>\n"
	. "\t</tr>\n";
	// Database name & default language
	$cssummary .= "\t<tr>\n"
	. "\t\t<td width='50%' align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("Database Name").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t$databasename\n"
	. "\t\t</td>\n"
	. "\t</tr>\n"
	. "\t<tr>\n"
	. "\t\t<td align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("Default Language").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t".getLanguageNameFromCode($defaultlang)."\n"
	. "\t\t</td>\n"
	. "\t</tr>\n";
	// Current language
	$cssummary .=  "\t<tr>\n"
	. "\t\t<td align='right' >\n"
	. "\t\t\t<strong>".$clang->gT("Current Language").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t<select name='lang' onchange='form.submit()'>\n";
	foreach (getlanguagedata() as $langkey=>$languagekind)
	{
		$cssummary .= "\t\t\t\t<option value='$langkey'";
		if ($langkey == $_SESSION['adminlang']) {$cssummary .= " selected='selected'";}
		$cssummary .= ">".$languagekind['description']." - ".$languagekind['nativedescription']."</option>\n";
	}
	$cssummary .= "\t\t\t</select>\n"
	. "\t\t\t<input type='hidden' name='action' value='changelang' />\n"
	. "\t\t</td>\n"
	. "\t</tr>\n";
	// Other infos
	$cssummary .=  "\t<tr>\n"
	. "\t\t<td align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("Users").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t$usercount\n"
	. "\t\t</td>\n"
	. "\t</tr>\n"
	. "\t<tr>\n"
	. "\t\t<td align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("Surveys").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t$surveycount\n"
	. "\t\t</td>\n"
	. "\t</tr>\n"
	. "\t<tr>\n"
	. "\t\t<td align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("Active Surveys").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t$activesurveycount\n"
	. "\t\t</td>\n"
	. "\t</tr>\n"
	. "\t<tr>\n"
	. "\t\t<td align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("De-activated Surveys").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t$deactivatedsurveys\n"
	. "\t\t</td>\n"
	. "\t</tr>\n"
	. "\t<tr>\n"
	. "\t\t<td align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("Active Token Tables").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t$activetokens\n"
	. "\t\t</td>\n"
	. "\t</tr>\n"
	. "\t<tr>\n"
	. "\t\t<td align='right'>\n"
	. "\t\t\t<strong>".$clang->gT("De-activated Token Tables").":</strong>\n"
	. "\t\t</td><td>\n"
	. "\t\t\t$deactivatedtokens\n"
	. "\t\t</td>\n"
	. "\t</tr>\n"
	. "</table></form>\n"
	. "<table><tr><td height='1'></td></tr></table>\n";
}
>>>>>>> refs/heads/limesurvey16

        $surveyinfo = $sumresult1->FetchRow();

<<<<<<< HEAD
        $surveyinfo = array_map('FlattenText', $surveyinfo);
        //$surveyinfo = array_map('htmlspecialchars', $surveyinfo);
        $activated = $surveyinfo['active'];
=======
		$baselang = GetBaseLanguageFromSurveyID($surveyid);
		$sumquery5 = "SELECT b.* FROM {$dbprefix}surveys AS a INNER JOIN {$dbprefix}surveys_rights AS b ON a.sid = b.sid WHERE a.sid=$surveyid AND b.uid = ".$_SESSION['loginID']; //Getting rights for this survey and user
		$sumresult5 = db_execute_assoc($sumquery5);
		$sumrows5 = $sumresult5->FetchRow();
		$sumquery3 = "SELECT * FROM ".db_table_name('questions')." WHERE sid=$surveyid AND language='".$baselang."'"; //Getting a count of questions for this survey
		$sumresult3 = $connect->Execute($sumquery3);
		$sumcount3 = $sumresult3->RecordCount();
		$sumquery2 = "SELECT * FROM ".db_table_name('groups')." WHERE sid=$surveyid AND language='".$baselang."'"; //Getting a count of groups for this survey
		$sumresult2 = $connect->Execute($sumquery2);
		$sumcount2 = $sumresult2->RecordCount();
		$sumquery1 = "SELECT * FROM ".db_table_name('surveys')." inner join ".db_table_name('surveys_languagesettings')." on (surveyls_survey_id=sid and surveyls_language=language) WHERE sid=$surveyid"; //Getting data for this survey
		$sumresult1 = db_select_limit_assoc($sumquery1, 1);
		$surveysummary .= "<table width='100%' align='center' bgcolor='#FFFFFF' border='0'>\n";
>>>>>>> refs/heads/limesurvey16

        ////////////////////////////////////////////////////////////////////////
        // SURVEY MENU BAR
        ////////////////////////////////////////////////////////////////////////

<<<<<<< HEAD
        $surveysummary .= ""  //"<tr><td colspan=2>\n"
        . "<div class='menubar surveybar'>\n"
        . "<div class='menubar-title ui-widget-header'>\n"
        . "<strong>".$clang->gT("Survey")."</strong> "
        . "<span class='basic'>{$surveyinfo['surveyls_title']} (".$clang->gT("ID").":{$surveyid})</span></div>\n"
        . "<div class='menubar-main'>\n"
        . "<div class='menubar-left'>\n";
=======
		$s1row = array_map('htmlspecialchars', $s1row);
		$activated = $s1row['active'];
		//BUTTON BAR
		$surveysummary .= "\t<tr>\n"
		. "\t\t<td colspan='2'>\n"
		. "\t\t\t<table class='menubar'>\n"
		. "\t\t\t\t<tr><td align='left'colspan='2' height='4'>"
		. "<strong>".$clang->gT("Survey")."</strong> "
<<<<<<< HEAD
		. "<font class='basic'>{$s1row['surveyls_title']} (ID:$surveyid)</font></td></tr>\n"
=======
		. "<font color='#778899'>{$s1row['surveyls_title']} (ID:$surveyid)</font></td></tr>\n"
>>>>>>> refs/heads/limesurvey16
		. "\t\t\t\t<tr ><td align='right' height='22'>\n";
		if ($activated == "N" )
		{
			$surveysummary .= "\t\t\t\t\t<img src='$imagefiles/inactive.png' "
			. "title='' alt='".$clang->gT("This survey is not currently active")."' border='0' hspace='0' align='left'"
			. "onmouseout=\"hideTooltip()\""
			. "onmouseover=\"showTooltip(event,'".$clang->gT("This survey is not currently active", "js")."');return false\" />\n";
			if($sumrows5['activate_survey'] && $sumcount3>0)
			{
				$surveysummary .= "<a href=\"#\" onclick=\"window.open('$scriptname?action=activate&amp;sid=$surveyid', '_top')\""
				. "onmouseout=\"hideTooltip()\""
				. "onmouseover=\"showTooltip(event,'".$clang->gT("Activate this Survey", "js")."');return false\">" .
				"<img src='$imagefiles/activate.png' name='ActivateSurvey' title='' alt='".$clang->gT("Activate this Survey")."' align='left' /></a>\n" ;
			}
			else
			{
				$surveysummary .= "<img src='$imagefiles/activate_disabled.png' onmouseout=\"hideTooltip()\""
				. "onmouseover=\"showTooltip(event,'".$clang->gT("Survey cannot be activated. Either you have no permission or there are no questions.", "js")."');return false\" name='ActivateSurvey' title='' alt='".$clang->gT("Survey cannot be activated. Either you have no permission or there are no questions.")."' align='left' />\n" ;
			}
		}
		elseif ($activated == "Y")
		{
			if (($s1row['useexpiry']=='Y') && ($s1row['expires'] < date_shift(date("Y-m-d H:i:s"), "Y-m-d", $timeadjust)))
			{
				$surveysummary .= "\t\t\t\t\t<img src='$imagefiles/expired.png' title='' "
				. "alt='".$clang->gT("This survey is active but expired.")."' align='left'"
				. "onmouseout=\"hideTooltip()\""
				. "onmouseover=\"showTooltip(event,'".$clang->gT("This survey is active but expired", "js")."');return false\" />\n";
			}
			else
			{
				$surveysummary .= "\t\t\t\t\t<img src='$imagefiles/active.png' title='' "
				. "alt='".$clang->gT("This survey is currently active")."' align='left'"
				. "onmouseout=\"hideTooltip()\""
				. "onmouseover=\"showTooltip(event,'".$clang->gT("This survey is currently active", "js")."');return false\" />\n";
			}
			if($sumrows5['activate_survey'])
			{
				$surveysummary .= "<a href=\"#\" onclick=\"window.open('$scriptname?action=deactivate&amp;sid=$surveyid', '_top')\""
				. "onmouseout=\"hideTooltip()\""
				. "onmouseover=\"showTooltip(event,'".$clang->gT("De-activate this Survey", "js")."');return false\">" .
				"<img src='$imagefiles/deactivate.png' name='DeactivateSurvey' "
				. "alt='".$clang->gT("De-activate this Survey")."' title='' align='left' /></a>\n" ;
			}
			else
			{
				$surveysummary .= "\t\t\t\t\t<img src='$imagefiles/blank.gif' alt='' width='14' align='left' border='0' hspace='0' />\n";
			}
		}
>>>>>>> refs/heads/stable_plus


        // ACTIVATE SURVEY BUTTON

        if ($activated == "N" )
        {
            $surveysummary .= "<img src='{$imageurl}/inactive.png' "
            . "alt='".$clang->gT("This survey is currently not active")."' />\n";
            if($sumcount3>0 && bHasSurveyPermission($surveyid,'surveyactivation','update'))
            {
                $surveysummary .= "<a href=\"#\" onclick=\"window.open('$scriptname?action=activate&amp;sid=$surveyid', '_top')\""
                . " title=\"".$clang->gTview("Activate this Survey")."\" >"
                . "<img src='{$imageurl}/activate.png' name='ActivateSurvey' alt='".$clang->gT("Activate this Survey")."'/></a>\n" ;
            }
            else
            {
                $surveysummary .= "<img src='{$imageurl}/activate_disabled.png' alt='"
                . $clang->gT("Survey cannot be activated. Either you have no permission or there are no questions.")."' />\n" ;
            }
        }
        elseif ($activated == "Y")
        {
            if ($surveyinfo['expires']!='' && ($surveyinfo['expires'] < date_shift(date("Y-m-d H:i:s"), "Y-m-d H:i", $timeadjust)))
            {
                $surveysummary .= "<img src='{$imageurl}/expired.png' "
                . "alt='".$clang->gT("This survey is active but expired.")."' />\n";
            }
            elseif (($surveyinfo['startdate']!='') && ($surveyinfo['startdate'] > date_shift(date("Y-m-d H:i:s"), "Y-m-d H:i", $timeadjust)))
            {
                $surveysummary .= "<img src='{$imageurl}/notyetstarted.png' "
                . "alt='".$clang->gT("This survey is active but has a start date.")."' />\n";
            }
            else
            {
                $surveysummary .= "<img src='{$imageurl}/active.png' title='' "
                . "alt='".$clang->gT("This survey is currently active.")."' />\n";
            }
            if(bHasSurveyPermission($surveyid,'surveyactivation','update'))
            {
                $surveysummary .= "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=deactivate&amp;sid=$surveyid', '_top')\""
                . " title=\"".$clang->gTview("Deactivate this Survey")."\" >"
                . "<img src='{$imageurl}/deactivate.png' alt='".$clang->gT("Deactivate this Survey")."' /></a>\n" ;
            }
            else
            {
                $surveysummary .= "<img src='{$imageurl}/blank.gif' alt='' width='14' />\n";
            }
        }

        $surveysummary .= "<img src='{$imageurl}/seperator.gif' alt=''  />\n"
        . "</div>\n";
        // Start of suckerfish menu
        $surveysummary .= "<ul class='sf-menu'>\n";

        // ACTIVATE SURVEY BUTTON

        if ($activated == "N")
        {
            $icontext=$clang->gT("Test This Survey");
            $icontext2=$clang->gTview("Test This Survey");
        } else
        {
            $icontext=$clang->gT("Execute This Survey");
            $icontext2=$clang->gTview("Execute This Survey");
        }
        $baselang = GetBaseLanguageFromSurveyID($surveyid);
        if (count(GetAdditionalLanguagesFromSurveyID($surveyid)) == 0)
        {
            $surveysummary .= "<li><a href='#' accesskey='d' onclick=\"window.open('"
            . $publicurl."/index.php?sid={$surveyid}&amp;newtest=Y&amp;lang={$baselang}', '_blank')\" title=\"{$icontext2}\" >"
            . "<img src='{$imageurl}/do.png' alt='{$icontext}' />"
            . "</a></li>\n";

        } else {
            $surveysummary .= "<li><a href='#' "
            . "title='{$icontext2}' accesskey='d'>"
            . "<img src='{$imageurl}/do.png' alt='{$icontext}' />"
            . "</a><ul>\n";
            $surveysummary .= "<li><a accesskey='d' target='_blank' href='{$publicurl}/index.php?sid=$surveyid&amp;newtest=Y'>"
              . "<img src='{$imageurl}/do_30.png' /> $icontext </a><ul>";
            $tmp_survlangs = GetAdditionalLanguagesFromSurveyID($surveyid);
            $tmp_survlangs[] = $baselang;
            rsort($tmp_survlangs);
            // Test Survey Language Selection Popup
            foreach ($tmp_survlangs as $tmp_lang)
            {
                $surveysummary .= "<li><a accesskey='d' target='_blank' href='{$publicurl}/index.php?sid=$surveyid&amp;newtest=Y&amp;lang={$tmp_lang}'>"
                . "<img src='{$imageurl}/do_30.png' /> ".getLanguageNameFromCode($tmp_lang,false)."</a></li>";
            }
            $surveysummary .= "</ul></li>"
            ."</ul></li>";
        }

        // SEPARATOR
        /*$surveysummary .= "<img src='{$imageurl}/seperator.gif' alt=''  />\n"
        . "</div>\n";*/

        $surveysummary .="<li><a href='#'>"
        . "<img src='$imageurl/edit.png' name='EditSurveyProperties' alt='".$clang->gT("Survey properties")."' /></a><ul>\n";

        // EDIT SURVEY TEXT ELEMENTS BUTTON
        if(bHasSurveyPermission($surveyid,'surveylocale','read'))
        {
            $surveysummary .= "<li><a href='{$scriptname}?action=editsurveylocalesettings&amp;sid={$surveyid}' >"
            . "<img src='{$imageurl}/edit_30.png' name='EditTextElements' /> ".$clang->gT("Edit text elements")."</a></li>\n";
        }

        // EDIT SURVEY SETTINGS BUTTON
        if(bHasSurveyPermission($surveyid,'surveysettings','read'))
        {
            $surveysummary .= "<li><a href='{$scriptname}?action=editsurveysettings&amp;sid={$surveyid}' >"
            . "<img src='{$imageurl}/token_manage_30.png' name='EditGeneralSettings' /> ".$clang->gT("General settings")."</a></li>\n";
        }

        // Survey permission item
        if($_SESSION['USER_RIGHT_SUPERADMIN'] == 1 || $surveyinfo['owner_id'] == $_SESSION['loginID'])
        {
            $surveysummary .= "<li><a href='{$scriptname}?action=surveysecurity&amp;sid={$surveyid}'>"
            . "<img src='{$imageurl}/survey_security_30.png' name='SurveySecurity'/> ".$clang->gT("Survey permissions")."</a></li>\n";
        }

        // CHANGE QUESTION GROUP ORDER BUTTON
        if (bHasSurveyPermission($surveyid,'surveycontent','read'))
        {
            if($activated=="Y")
            {
                $surveysummary .= "<li><a href=\"#\" onclick=\"alert('".$clang->gT("You can't reorder question groups if the survey is active.", "js")."');\" >"
                . "<img src='$imageurl/reorder_disabled_30.png' name='translate'/> ".$clang->gT("Reorder question groups")."</a></li>\n";
            }
            elseif (getGroupSum($surveyid,$surveyinfo['language'])>1)
            {
                $surveysummary .= "<li><a href='{$scriptname}?action=ordergroups&amp;sid={$surveyid}'>"
                . "<img src='{$imageurl}/reorder_30.png' /> ".$clang->gT("Reorder question groups")."</a></li>\n";
            }
            else{
                $surveysummary .= "<li><a href=\"#\" onclick=\"alert('".$clang->gT("You can't reorder question groups if there is only one group.", "js")."');\" >"
                . "<img src='$imageurl/reorder_disabled_30.png' name='translate'/> ".$clang->gT("Reorder question groups")."</a></li>\n";
            }

        }

        // SET SURVEY QUOTAS BUTTON
        if (bHasSurveyPermission($surveyid,'quotas','read'))
        {
            $surveysummary .= "<li><a href='{$scriptname}?action=quotas&amp;sid={$surveyid}'>"
            . "<img src='{$imageurl}/quota_30.png' /> ".$clang->gT("Quotas")."</a></li>\n" ;
        }

        // Assessment menu item
        if (bHasSurveyPermission($surveyid,'assessments','read'))
        {
            $surveysummary .= "<li><a href='{$scriptname}?action=assessments&amp;sid={$surveyid}'>"
            . "<img src='{$imageurl}/assessments_30.png' /> ".$clang->gT("Assessments")."</a></li>\n" ;
        }

        // EDIT SURVEY TEXT ELEMENTS BUTTON
        if(bHasSurveyPermission($surveyid,'surveylocale','read'))
        {
            $surveysummary .= "<li><a href='{$scriptname}?action=emailtemplates&amp;sid={$surveyid}' >"
            . "<img src='{$imageurl}/emailtemplates_30.png' name='EditEmailTemplates' /> ".$clang->gT("Email templates")."</a></li>\n";
        }

        $surveysummary .='</ul></li>'; // End if survey properties


        // Tools menu item
        $surveysummary .= "<li><a href=\"#\">"
        . "<img src='{$imageurl}/tools.png' name='SorveyTools' alt='".$clang->gT("Tools")."' /></a><ul>\n";


        // Delete survey item
        if (bHasSurveyPermission($surveyid,'survey','delete'))
        {
            //            $surveysummary .= "<a href=\"#\" onclick=\"window.open('$scriptname?action=deletesurvey&amp;sid=$surveyid', '_top')\""
            $surveysummary .= "<li><a href=\"#\" onclick=\"".get2post("{$scriptname}?action=deletesurvey&amp;sid={$surveyid}")."\">"
            . "<img src='{$imageurl}/delete_30.png' name='DeleteSurvey' /> ".$clang->gT("Delete survey")."</a></li>\n" ;
        }


        // Translate survey item
        if (bHasSurveyPermission($surveyid,'translations','read'))
        {
          // Check if multiple languages have been activated
          $supportedLanguages = getLanguageData(false);
          if (count(GetAdditionalLanguagesFromSurveyID($surveyid)) > 0)
          {
            $surveysummary .= "<li><a href='{$scriptname}?action=translate&amp;sid={$surveyid}'>"
            . "<img src='{$imageurl}/translate_30.png' /> ".$clang->gT("Quick-translation")."</a></li>\n";
          }
          else
          {
            $surveysummary .= "<li><a href=\"#\" onclick=\"alert('".$clang->gT("Currently there are no additional languages configured for this survey.", "js")."');\" >"
            . "<img src='$imageurl/translate_disabled_30.png' /> ".$clang->gT("Quick-translation")."</a></li>\n";
          }
        }

        // RESET SURVEY LOGIC BUTTON

<<<<<<< HEAD
        if (bHasSurveyPermission($surveyid,'surveycontent','update'))
        {
            if ($sumcount6 > 0) {
                $surveysummary .= "<li><a href=\"#\" onclick=\"".get2post("{$scriptname}?action=resetsurveylogic&amp;sid=$surveyid")."\">"
                . "<img src='{$imageurl}/resetsurveylogic_30.png' name='ResetSurveyLogic' /> ".$clang->gT("Reset conditions")."</a></li>\n";
            }
            else
            {
                $surveysummary .= "<li><a href=\"#\" onclick=\"alert('".$clang->gT("Currently there are no conditions configured for this survey.", "js")."');\" >"
                . "<img src='{$imageurl}/resetsurveylogic_disabled_30.png' name='ResetSurveyLogic' /> ".$clang->gT("Reset Survey Logic")."</a></li>\n";
            }
        }
        $surveysummary .='</ul></li>' ;
=======
	$groupsummary = "<table width='100%' align='center' bgcolor='#FFFFFF' border='0'>\n";
	while ($grow = $grpresult->FetchRow())
	{
		$grow = array_map('htmlspecialchars', $grow);
		$groupsummary .= "\t<tr>\n"
		. "\t\t<td colspan='2'>\n"
		. "\t\t\t<table class='menubar'>\n"
		. "\t\t\t\t<tr><td align='left' colspan='2' height='4'>"
		. "<strong>".$clang->gT("Group")."</strong> "
		. "<font color='#778899'>{$grow['group_name']} (ID:$gid)</font></td></tr>\n"
		. "\t\t\t\t<tr>\n"
		. "\t\t\t\t\t<td>\n"
		. "\t\t\t\t\t<img src='$imagefiles/blank.gif' alt='' width='55' height='20' border='0' hspace='0' align='left' />\n"
		. "\t\t\t\t\t<img src='$imagefiles/seperator.gif' alt='' border='0' hspace='0' align='left' />\n"
		. "\t\t\t\t\t<img src='$imagefiles/blank.gif' alt='' width='160' height='20' border='0' hspace='0' align='left' />\n"
		. "\t\t\t\t\t<img src='$imagefiles/seperator.gif' alt='' border='0' hspace='0' align='left' />\n";
>>>>>>> refs/heads/limesurvey16



        // Display/Export main menu item
        $surveysummary .= "<li><a href='#'>"
        . "<img src='{$imageurl}/display_export.png' name='DisplayExport' alt='".$clang->gT("Display / Export")."' /></a><ul>\n";

        // Eport menu item
        if (bHasSurveyPermission($surveyid,'surveycontent','export'))
        {
            $surveysummary .= "<li><a href='{$scriptname}?action=exportstructure&amp;sid={$surveyid}'>"
            . "<img src='{$imageurl}/export_30.png' /> ". $clang->gT("Export survey")."</a></li>\n" ;
        }

        // PRINTABLE VERSION OF SURVEY BUTTON

        if (count(GetAdditionalLanguagesFromSurveyID($surveyid)) == 0)
        {
            $surveysummary .= "<li><a  target='_blank' href='{$scriptname}?action=showprintablesurvey&amp;sid={$surveyid}'>"
            . "<img src='{$imageurl}/print_30.png' name='ShowPrintableSurvey' /> ".$clang->gT("Printable version")."</a></li>";
        }
        else
        {
            $surveysummary .= "<li><a  target='_blank' href='{$scriptname}?action=showprintablesurvey&amp;sid={$surveyid}'>"
            . "<img src='{$imageurl}/print_30.png' name='ShowPrintableSurvey' /> ".$clang->gT("Printable version")."</a><ul>";
            $tmp_survlangs = GetAdditionalLanguagesFromSurveyID($surveyid);
            $baselang = GetBaseLanguageFromSurveyID($surveyid);
            $tmp_survlangs[] = $baselang;
            rsort($tmp_survlangs);
            foreach ($tmp_survlangs as $tmp_lang)
            {
                $surveysummary .= "<li><a target='_blank' href='{$scriptname}?action=showprintablesurvey&amp;sid={$surveyid}&amp;lang={$tmp_lang}'><img src='{$imageurl}/print_30.png' /> ".getLanguageNameFromCode($tmp_lang,false)."</a></li>";
            }
            $surveysummary.='</ul></li>';
        }


        // SHOW PRINTABLE AND SCANNABLE VERSION OF SURVEY BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','export'))
        {
            if (count(GetAdditionalLanguagesFromSurveyID($surveyid)) == 0)
            {

<<<<<<< HEAD
                $surveysummary .= "<li><a href='{$scriptname}?action=showquexmlsurvey&amp;sid={$surveyid}'>"
                . "<img src='{$imageurl}/scanner_30.png' name='ShowPrintableScannableSurvey' /> ".$clang->gT("QueXML export")."</a></li>";
=======
	while ($qrrow = $qrresult->FetchRow())
	{
		$qrrow = array_map('htmlspecialchars', $qrrow);
		$questionsummary .= "\t<tr>\n"
		. "\t\t<td colspan='2'>\n"
		. "\t\t\t<table class='menubar'>\n"
		. "\t\t\t\t<tr><td colspan='2' height='4' align='left'><strong>"
		. $clang->gT("Question")."</strong> <font color='#778899'>{$qrrow['question']} (ID:$qid)</font></td></tr>\n"
		. "\t\t\t\t<tr>\n"
		. "\t\t\t\t\t<td>\n"
		. "\t\t\t\t\t<img src='$imagefiles/blank.gif' alt='' width='55' height='20' border='0' hspace='0' align='left' />\n"
		. "\t\t\t\t\t<img src='$imagefiles/seperator.gif' alt='' border='0' hspace='0' align='left' />\n"
		. "\t\t\t\t\t<img src='$imagefiles/blank.gif' alt='' width='160' height='20' border='0' hspace='0' align='left' />\n"
		. "\t\t\t\t\t<img src='$imagefiles/seperator.gif' alt='' border='0' hspace='0' align='left' />\n";
>>>>>>> refs/heads/limesurvey16

            } else {

                $surveysummary .= "<li><a href='{$scriptname}?action=showquexmlsurvey&amp;sid={$surveyid}'>"
                . "<img src='{$imageurl}/scanner_30.png' name='ShowPrintableScannableSurvey' /> ".$clang->gT("QueXML export")."</a><ul>";

                $tmp_survlangs = GetAdditionalLanguagesFromSurveyID($surveyid);
                $baselang = GetBaseLanguageFromSurveyID($surveyid);
                $tmp_survlangs[] = $baselang;
                rsort($tmp_survlangs);

                // Test Survey Language Selection Popup
                foreach ($tmp_survlangs as $tmp_lang)
                {
                    $surveysummary .= "<li><a href='{$scriptname}?action=showquexmlsurvey&amp;sid={$surveyid}&amp;lang={$tmp_lang}'>
                    <img src='{$imageurl}/scanner_30.png' /> ".getLanguageNameFromCode($tmp_lang,false)."</a></li>";
                }
                $surveysummary .= "</ul></li>";
            }
        }
        $surveysummary .='</ul></li>' ;



        // Display/Export main menu item
        $surveysummary .= "<li><a href='#'><img src='{$imageurl}/responses.png' name='Responses' alt='".$clang->gT("Responses")."' /></a><ul>\n";

        //browse responses menu item
        if (bHasSurveyPermission($surveyid,'responses','read') || bHasSurveyPermission($surveyid,'statistics','read') || bHasSurveyPermission($surveyid,'responses','export'))
        {
            if ($activated == "Y")
            {
                $surveysummary .= "<li><a href='{$scriptname}?action=browse&amp;sid={$surveyid}'>"
                . "<img src='{$imageurl}/browse_30.png' name='BrowseSurveyResults' /> ".$clang->gT("Responses & statistics")."</a></li>\n";
            }
            else
            {
                $surveysummary .= "<li><a href='#' onclick=\"alert('".$clang->gT("This survey is not active - no responses are available.","js")."')\">"
                . "<img src='{$imageurl}/browse_disabled_30.png' name='BrowseSurveyResults' /> ".$clang->gT("Responses & statistics")."</a></li>\n";
            }

        }

        // Data entry screen menu item
        if (bHasSurveyPermission($surveyid,'responses','create'))
        {
            if($activated == "Y")
            {
                $surveysummary .= "<li><a href='{$scriptname}?action=dataentry&amp;sid={$surveyid}'>"
                . "<img src='{$imageurl}/dataentry_30.png' /> ".$clang->gT("Data entry screen")."</a></li>\n";
            }
            else {
                $surveysummary .= "<li><a href='#' onclick=\"alert('".$clang->gT("This survey is not active, data entry is not allowed","js")."')\">"
                . "<img src='{$imageurl}/dataentry_disabled_30.png'/> ".$clang->gT("Data entry screen")."</a></li>\n";
            }
        }



        if (bHasSurveyPermission($surveyid,'responses','read'))
        {
            if ($activated == "Y")
            {
                $surveysummary .= "<li><a href='#' onclick=\"window.open('{$scriptname}?action=saved&amp;sid=$surveyid', '_top')\" >"
                . "<img src='{$imageurl}/saved_30.png' name='BrowseSaved' /> ".$clang->gT("Partial (saved) responses")."</a></li>\n";
            }
            else
            {
                $surveysummary .= "<li><a href='#' onclick=\"alert('".$clang->gT("This survey is not active - no responses are available.","js")."')\">"
                . "<img src='{$imageurl}/saved_disabled_30.png' name='PartialResponses' /> ".$clang->gT("Partial (saved) responses")."</a></li>\n";
            }

        }

        $surveysummary .='</ul></li>' ;


        // TOKEN MANAGEMENT BUTTON

        if (bHasSurveyPermission($surveyid,'surveysettings','update') || bHasSurveyPermission($surveyid,'tokens','read'))
        {
         //   $surveysummary .= "<img src='$imageurl/seperator.gif' alt=''  />\n";
            $surveysummary .="<li><a href='#' onclick=\"window.open('$scriptname?action=tokens&amp;sid=$surveyid', '_top')\""
            . " title=\"".$clang->gTview("Token management")."\" >"
            . "<img src='$imageurl/tokens.png' name='TokensControl' alt='".$clang->gT("Token management")."' /></a></li>\n" ;
        }


        $surveysummary .= "</ul>";

        // End of survey toolbar 2nd page

        ////////////////////////////////////////////////////////////////////////
        // QUESTION GROUP TOOLBAR
        ////////////////////////////////////////////////////////////////////////

        $surveysummary.= "<div class='menubar-right'>\n";
        if (bHasSurveyPermission($surveyid,'surveycontent','read'))
        {
            $surveysummary .= "<span class=\"boxcaption\">".$clang->gT("Question groups").":</span>"
            . "<select name='groupselect' onchange=\"window.open(this.options[this.selectedIndex].value,'_top')\">\n";

            if (getgrouplistlang($gid, $baselang))
            {
                $surveysummary .= getgrouplistlang($gid, $baselang);
            }
            else
            {
                $surveysummary .= "<option>".$clang->gT("None")."</option>\n";
            }
            $surveysummary .= "</select>\n";
        }
        else
        {
            $gid=null;
            $qid=null;
        }

        // QUICK NAVIGATION TO PREVIOUS AND NEXT QUESTION GROUP
        // TODO: Fix functionality to previous and next question group buttons (Andrie)
        $GidPrev = getGidPrevious($surveyid, $gid);
        $surveysummary .= "<span class='arrow-wrapper'>";
        if ($GidPrev != "")
        {
          $surveysummary .= ""
            . "<a href='{$scriptname}?sid=$surveyid&amp;gid=$GidPrev'>"
            . "<img src='{$imageurl}/previous_20.png' title='' alt='".$clang->gT("Previous question group")."' "
            ."name='questiongroupprevious' ".$clang->gT("Previous question group")."/> </a>";
        }
        else
        {
          $surveysummary .= ""
            . "<img src='{$imageurl}/previous_disabled_20.png' title='' alt='".$clang->gT("No previous question group")."' "
            ."name='noquestiongroupprevious' />";
        }

        $GidNext = getGidNext($surveyid, $gid);
        if ($GidNext != "")
        {
          $surveysummary .= ""
            . "<a href='{$scriptname}?sid=$surveyid&amp;gid=$GidNext'>"
            . "<img src='{$imageurl}/next_20.png' title='' alt='".$clang->gT("Next question group")."' "
            ."name='questiongroupnext' /> </a>";
        }
        else
        {
          $surveysummary .= ""
            . "<img src='{$imageurl}/next_disabled_20.png' title='' alt='".$clang->gT("No next question group")."' "
            ."name='noquestiongroupnext' />";
        }
		$surveysummary .= "</span>";


        // ADD NEW GROUP TO SURVEY BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','create'))
        {
            if ($activated == "Y")
            {
                $surveysummary .= "<a href='#'>"
                ."<img src='$imageurl/add_disabled.png' title='' alt='".$clang->gT("Disabled").' - '.$clang->gT("This survey is currently active.")."' " .
                " name='AddNewGroup' /></a>\n";
            }
            else
            {
                $surveysummary .= "<a href=\"#\" onclick=\"window.open('$scriptname?action=addgroup&amp;sid=$surveyid', '_top')\""
                . " title=\"".$clang->gTview("Add new group to survey")."\">"
                . "<img src='$imageurl/add.png' alt='".$clang->gT("Add new group to survey")."' name='AddNewGroup' /></a>\n";
            }
        }
        $surveysummary .= "<img src='$imageurl/seperator.gif' alt='' />\n"
        . "<img src='$imageurl/blank.gif' width='15' alt='' />"
        . "<input type='image' src='$imageurl/minus.gif' title='". $clang->gT("Hide details of this Survey")."' "
        . "alt='". $clang->gT("Hide details of this Survey")."' name='MinimiseSurveyWindow' "
        . "onclick='document.getElementById(\"surveydetails\").style.display=\"none\";' />\n";

        $surveysummary .= "<input type='image' src='$imageurl/plus.gif' title='". $clang->gT("Show details of this survey")."' "
        . "alt='". $clang->gT("Show details of this survey")."' name='MaximiseSurveyWindow' "
        . "onclick='document.getElementById(\"surveydetails\").style.display=\"\";' />\n";

        if (!$gid)
        {
            $surveysummary .= "<input type='image' src='$imageurl/close.gif' title='". $clang->gT("Close this survey")."' "
            . "alt='".$clang->gT("Close this survey")."' name='CloseSurveyWindow' "
            . "onclick=\"window.open('$scriptname', '_top')\" />\n";
        }
        else
        {
            $surveysummary .= "<img src='$imageurl/blank.gif' width='18' alt='' />\n";
        }



        $surveysummary .= "</div>\n"
        . "</div>\n"
        . "</div>\n";

        //SURVEY SUMMARY
        if ($gid || $qid || $action=="deactivate"|| $action=="activate" || $action=="surveysecurity"
        || $action=="surveyrights" || $action=="addsurveysecurity" || $action=="addusergroupsurveysecurity"
        || $action=="setsurveysecurity" ||  $action=="setusergroupsurveysecurity" || $action=="delsurveysecurity"
        || $action=="editsurveysettings"|| $action=="editsurveylocalesettings" || $action=="updatesurveysettingsandeditlocalesettings" || $action=="addgroup" || $action=="importgroup"
        || $action=="ordergroups" || $action=="deletesurvey" || $action=="resetsurveylogic"
        || $action=="importsurveyresources" || $action=="translate"  || $action=="emailtemplates"
        || $action=="exportstructure" || $action=="quotas" || $action=="copysurvey") {$showstyle="style='display: none'";}
        if (!isset($showstyle)) {$showstyle="";}
        $aAdditionalLanguages = GetAdditionalLanguagesFromSurveyID($surveyid);
        $surveysummary .= "<table $showstyle id='surveydetails'><tr><td align='right' valign='top' width='15%'>"
        . "<strong>".$clang->gT("Title").":</strong></td>\n"
        . "<td align='left' class='settingentryhighlight'><strong>{$surveyinfo['surveyls_title']} "
        . "(".$clang->gT("ID")." {$surveyinfo['sid']})</strong></td></tr>\n";
        $surveysummary2 = "";
        if ($surveyinfo['anonymized'] != "N") {$surveysummary2 .= $clang->gT("Answers to this survey are anonymized.")."<br />\n";}
        else {$surveysummary2 .= $clang->gT("This survey is NOT anonymous.")."<br />\n";}
        if ($surveyinfo['format'] == "S") {$surveysummary2 .= $clang->gT("It is presented question by question.")."<br />\n";}
        elseif ($surveyinfo['format'] == "G") {$surveysummary2 .= $clang->gT("It is presented group by group.")."<br />\n";}
        else {$surveysummary2 .= $clang->gT("It is presented on one single page.")."<br />\n";}
        if ($surveyinfo['allowjumps'] == "Y")
        {
          if ($surveyinfo['format'] == 'A') {$surveysummary2 .= $clang->gT("No question index will be shown with this format.")."<br />\n";}
          else {$surveysummary2 .= $clang->gT("A question index will be shown; participants will be able to jump between viewed questions.")."<br />\n";}
        }
        if ($surveyinfo['datestamp'] == "Y") {$surveysummary2 .= $clang->gT("Responses will be date stamped.")."<br />\n";}
        if ($surveyinfo['ipaddr'] == "Y") {$surveysummary2 .= $clang->gT("IP Addresses will be logged")."<br />\n";}
        if ($surveyinfo['refurl'] == "Y") {$surveysummary2 .= $clang->gT("Referrer URL will be saved.")."<br />\n";}
        if ($surveyinfo['usecookie'] == "Y") {$surveysummary2 .= $clang->gT("It uses cookies for access control.")."<br />\n";}
        if ($surveyinfo['allowregister'] == "Y") {$surveysummary2 .= $clang->gT("If tokens are used, the public may register for this survey")."<br />\n";}
        if ($surveyinfo['allowsave'] == "Y" && $surveyinfo['tokenanswerspersistence'] == 'N') {$surveysummary2 .= $clang->gT("Participants can save partially finished surveys")."<br />\n";}
        if ($surveyinfo['emailnotificationto'] != '')
        {
            $surveysummary2 .= $clang->gT("Basic email notification is sent to:")." {$surveyinfo['emailnotificationto']}<br />\n";
        }
        if ($surveyinfo['emailresponseto'] != '')
        {
            $surveysummary2 .= $clang->gT("Detailed email notification with response data is sent to:")." {$surveyinfo['emailresponseto']}<br />\n";
        }

        if(bHasSurveyPermission($surveyid,'surveycontent','update'))
        {
            $surveysummary2 .= $clang->gT("Regenerate question codes:")
            . " [<a href='#' "
            . "onclick=\"if (confirm('".$clang->gT("Are you sure you want regenerate the question codes?","js")."')) {".get2post("$scriptname?action=renumberquestions&amp;sid=$surveyid&amp;style=straight")."}\" "
            . ">".$clang->gT("Straight")."</a>] "
            . " [<a href='#' "
            . "onclick=\"if (confirm('".$clang->gT("Are you sure you want regenerate the question codes?","js")."')) {".get2post("$scriptname?action=renumberquestions&amp;sid=$surveyid&amp;style=bygroup")."}\" "
            . ">".$clang->gT("By Group")."</a>]";
            $surveysummary2 .= "</td></tr>\n";
        }
        $surveysummary .= "<tr>"
        . "<td align='right' valign='top'><strong>"
        . $clang->gT("Survey URL") ." (".getLanguageNameFromCode($surveyinfo['language'],false)."):</strong></td>\n";
        if ( $modrewrite ) {
            $tmp_url = $GLOBALS['publicurl'] . '/' . $surveyinfo['sid'];
            $surveysummary .= "<td align='left'> <a href='$tmp_url/lang-".$surveyinfo['language']."' target='_blank'>$tmp_url/lang-".$surveyinfo['language']."</a>";
            foreach ($aAdditionalLanguages as $langname)
            {
                $surveysummary .= "&nbsp;<a href='$tmp_url/lang-$langname' target='_blank'><img title='".$clang->gT("Survey URL for language:")." ".getLanguageNameFromCode($langname,false)."' alt='".getLanguageNameFromCode($langname,false)." ".$clang->gT("Flag")."' src='../images/flags/$langname.png' /></a>";
            }
        } else {
            $tmp_url = $GLOBALS['publicurl'] . '/index.php?sid=' . $surveyinfo['sid'];
            $surveysummary .= "<td align='left'> <a href='$tmp_url&amp;lang=".$surveyinfo['language']."' target='_blank'>$tmp_url&amp;lang=".$surveyinfo['language']."</a>";
            foreach ($aAdditionalLanguages as $langname)
            {
                $surveysummary .= "&nbsp;<a href='$tmp_url&amp;lang=$langname' target='_blank'><img title='".$clang->gT("Survey URL for language:")." ".getLanguageNameFromCode($langname,false)."' alt='".getLanguageNameFromCode($langname,false)." ".$clang->gT("Flag")."' src='../images/flags/$langname.png' /></a>";
            }
        }

        $surveysummary .= "</td></tr>\n"
        . "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Description:")."</strong></td>\n<td align='left'>";
        if (trim($surveyinfo['surveyls_description'])!='') {$surveysummary .= " {$surveyinfo['surveyls_description']}";}
        $surveysummary .= "</td></tr>\n"
        . "<tr >\n"
        . "<td align='right' valign='top'><strong>"
        . $clang->gT("Welcome:")."</strong></td>\n"
        . "<td align='left'> {$surveyinfo['surveyls_welcometext']}</td></tr>\n"
        . "<tr ><td align='right' valign='top'><strong>"
        . $clang->gT("Administrator:")."</strong></td>\n"
        . "<td align='left'> {$surveyinfo['admin']} ({$surveyinfo['adminemail']})</td></tr>\n";
        if (trim($surveyinfo['faxto'])!='')
        {
            $surveysummary .="<tr><td align='right' valign='top'><strong>"
            . $clang->gT("Fax to:")."</strong></td>\n<td align='left'>{$surveyinfo['faxto']}";
            $surveysummary .= "</td></tr>\n";
        }
        $surveysummary .= "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Start date/time:")."</strong></td>\n";
        $dateformatdetails=getDateFormatData($_SESSION['dateformat']);
        if (trim($surveyinfo['startdate'])!= '')
        {
            $datetimeobj = new Date_Time_Converter($surveyinfo['startdate'] , "Y-m-d H:i:s");
            $startdate=$datetimeobj->convert($dateformatdetails['phpdate'].' H:i');
        }
        else
        {
            $startdate="-";
        }
        $surveysummary .= "<td align='left'>$startdate</td></tr>\n"
        . "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Expiry date/time:")."</strong></td>\n";
        if (trim($surveyinfo['expires'])!= '')
        {
            $datetimeobj = new Date_Time_Converter($surveyinfo['expires'] , "Y-m-d H:i:s");
            $expdate=$datetimeobj->convert($dateformatdetails['phpdate'].' H:i');
        }
        else
        {
            $expdate="-";
        }
        $surveysummary .= "<td align='left'>$expdate</td></tr>\n"
        . "<tr ><td align='right' valign='top'><strong>"
        . $clang->gT("Template:")."</strong></td>\n"
        . "<td align='left'> {$surveyinfo['template']}</td></tr>\n"

        . "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Base language:")."</strong></td>\n";
        if (!$surveyinfo['language']) {$language=getLanguageNameFromCode($currentadminlang,false);} else {$language=getLanguageNameFromCode($surveyinfo['language'],false);}
        $surveysummary .= "<td align='left'>$language</td></tr>\n";

        // get the rowspan of the Additionnal languages row
        // is at least 1 even if no additionnal language is present
        $additionnalLanguagesCount = count($aAdditionalLanguages);
        $surveysummary .= "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Additional Languages").":</strong></td>\n";
        $first=true;
        if ($additionnalLanguagesCount == 0)
        {
                    $surveysummary .= "<td align='left'>-</td>\n";
        }
        else
        {
        foreach ($aAdditionalLanguages as $langname)
        {
            if ($langname)
            {
                if (!$first) {$surveysummary .= "<tr><td>&nbsp;</td>";}
                $first=false;
                $surveysummary .= "<td align='left'>".getLanguageNameFromCode($langname,false)."</td></tr>\n";
            }
        }
        }
        if ($first) $surveysummary .= "</tr>";

        if ($surveyinfo['surveyls_urldescription']==""){$surveyinfo['surveyls_urldescription']=htmlspecialchars($surveyinfo['surveyls_url']);}
        $surveysummary .= "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("End URL").":</strong></td>\n"
        . "<td align='left'>";
        if ($surveyinfo['surveyls_url']!="")
        {
            $surveysummary .=" <a target='_blank' href=\"".htmlspecialchars($surveyinfo['surveyls_url'])."\" title=\"".htmlspecialchars($surveyinfo['surveyls_url'])."\">{$surveyinfo['surveyls_urldescription']}</a>";
        }
        else
        {
            $surveysummary .="-";
        }
        $surveysummary .="</td></tr>\n";
        $surveysummary .= "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Number of questions/groups").":</strong></td><td>$sumcount3/$sumcount2</td></tr>\n";
        $surveysummary .= "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Survey currently active").":</strong></td><td>";
        if ($activated == "N")
        {
            $surveysummary .= $clang->gT("No");
        }
        else
        {
            $surveysummary .= $clang->gT("Yes");
        }
        $surveysummary .="</td></tr>\n";

        if ($activated == "Y")
        {
            $surveysummary .= "<tr><td align='right' valign='top'><strong>"
            . $clang->gT("Survey table name").":</strong></td><td>".$dbprefix."survey_$surveyid</td></tr>\n";
        }
        $surveysummary .= "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Hints").":</strong></td><td>\n";

        if ($activated == "N" && $sumcount3 == 0)
        {
            $surveysummary .= $clang->gT("Survey cannot be activated yet.")."<br />\n";
            if ($sumcount2 == 0 && bHasSurveyPermission($surveyid,'surveycontent','create'))
            {
                $surveysummary .= "<span class='statusentryhighlight'>[".$clang->gT("You need to add question groups")."]</span><br />";
            }
            if ($sumcount3 == 0 && bHasSurveyPermission($surveyid,'surveycontent','create'))
            {
                $surveysummary .= "<span class='statusentryhighlight'>[".$clang->gT("You need to add questions")."]</span><br />";
            }
        }
        $surveysummary .=  $surveysummary2
        . "</table>\n";
    }
    else
    {
        include("access_denied.php");
    }
}


if (isset($surveyid) && $surveyid && $gid )   // Show the group toolbar
{
    // TODO: check that surveyid and thus baselang are always set here
    $sumquery4 = "SELECT * FROM ".db_table_name('questions')." WHERE sid=$surveyid AND
	gid=$gid AND language='".$baselang."'"; //Getting a count of questions for this survey
    $sumresult4 = $connect->Execute($sumquery4); //Checked
    $sumcount4 = $sumresult4->RecordCount();
    $grpquery ="SELECT * FROM ".db_table_name('groups')." WHERE gid=$gid AND
	language='".$baselang."' ORDER BY ".db_table_name('groups').".group_order";
    $grpresult = db_execute_assoc($grpquery); //Checked

    // Check if other questions/groups are dependent upon this group
    $condarray=GetGroupDepsForConditions($surveyid,"all",$gid,"by-targgid");

    $groupsummary = "<div class='menubar'>\n"
    . "<div class='menubar-title ui-widget-header'>\n";

    while ($grow = $grpresult->FetchRow())
    {
        $grow = array_map('FlattenText', $grow);
        $groupsummary .= '<strong>'.$clang->gT("Question group").'</strong>&nbsp;'
        . "<span class='basic'>{$grow['group_name']} (".$clang->gT("ID").":$gid)</span>\n"
        . "</div>\n"
        . "<div class='menubar-main'>\n"
        . "<div class='menubar-left'>\n";


//        // CREATE BLANK SPACE FOR IMAGINARY BUTTONS
//
//
        $groupsummary .= ""
        . "<img src='$imageurl/blank.gif' alt='' width='54' height='20'  />\n";

        if(bHasSurveyPermission($surveyid,'surveycontent','update'))
        {
            $groupsummary .=  "<img src='$imageurl/seperator.gif' alt=''  />\n"
            . "<a href=\"#\" onclick=\"window.open('$scriptname?action=previewgroup&amp;sid=$surveyid&amp;gid=$gid','_blank')\""
            . " title=\"".$clang->gTview("Preview current question group")."\">"
            . "<img src='$imageurl/preview.png' alt='".$clang->gT("Preview current question group")."' name='PreviewGroup' /></a>\n" ;
        }
        else{
            $groupsummary .=  "<img src='$imageurl/seperator.gif' alt=''  />\n";
        }



        // EDIT CURRENT QUESTION GROUP BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','update'))
        {
            $groupsummary .=  "<img src='$imageurl/seperator.gif' alt=''  />\n"
            . "<a href=\"#\" onclick=\"window.open('$scriptname?action=editgroup&amp;sid=$surveyid&amp;gid=$gid','_top')\""
            . " title=\"".$clang->gTview("Edit current question group")."\">"
            . "<img src='$imageurl/edit.png' alt='".$clang->gT("Edit current question group")."' name='EditGroup' /></a>\n" ;
        }


        // DELETE CURRENT QUESTION GROUP BUTTON

        if (bHasSurveyPermission($surveyid,'surveycontent','delete'))
        {
            if ((($sumcount4 == 0 && $activated != "Y") || $activated != "Y"))
            {
                if (is_null($condarray))
                {
                    //				$groupsummary .= "<a href='$scriptname?action=delgroup&amp;sid=$surveyid&amp;gid=$gid' onclick=\"return confirm('".$clang->gT("Deleting this group will also delete any questions and answers it contains. Are you sure you want to continue?","js")."')\""
                    $groupsummary .= "<a href='#' onclick=\"if (confirm('".$clang->gT("Deleting this group will also delete any questions and answers it contains. Are you sure you want to continue?","js")."')) {".get2post("$scriptname?action=delgroup&amp;sid=$surveyid&amp;gid=$gid")."}\""
                    . " title=\"".$clang->gTview("Delete current question group")."\">"
                    . "<img src='$imageurl/delete.png' alt='".$clang->gT("Delete current question group")."' name='DeleteWholeGroup' title=''  /></a>\n";
                    //get2post("$scriptname?action=delgroup&amp;sid=$surveyid&amp;gid=$gid");
                }
                else
                {
                    $groupsummary .= "<a href='$scriptname?sid=$surveyid&amp;gid=$gid' onclick=\"alert('".$clang->gT("Impossible to delete this group because there is at least one question having a condition on its content","js")."')\""
                    . " title=\"".$clang->gTview("Delete current question group")."\">"
                    . "<img src='$imageurl/delete_disabled.png' alt='".$clang->gT("Delete current question group")."' name='DeleteWholeGroup' /></a>\n";
                }
            }
            else
            {
                $groupsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";
            }
        }


        // EXPORT QUESTION GROUP BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','export'))
        {

            $groupsummary .="<a href='$scriptname?action=exportstructureGroup&amp;sid=$surveyid&amp;gid=$gid' title=\"".$clang->gTview("Export this question group")."\" >"
            . "<img src='$imageurl/dumpgroup.png' title='' alt='".$clang->gT("Export this question group")."' name='ExportGroup'  /></a>\n";
        }


        // CHANGE QUESTION ORDER BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','update'))
        {
            $groupsummary .= "<img src='$imageurl/seperator.gif' alt='' />\n";
            if($activated!="Y" && getQuestionSum($surveyid, $gid)>1)
            {
//                $groupsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";
//                $groupsummary .= "<img src='$imageurl/seperator.gif' alt='' />\n";
                $groupsummary .= "<a href='$scriptname?action=orderquestions&amp;sid=$surveyid&amp;gid=$gid' title=\"".$clang->gTview("Change Question Order")."\" >"
                . "<img src='$imageurl/reorder.png' alt='".$clang->gT("Change Question Order")."' name='updatequestionorder' /></a>\n" ;
            }
            else
            {
                $groupsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";
            }
        }

        $groupsummary.= "</div>\n"
        . "<div class='menubar-right'>\n"
        . "<span class=\"boxcaption\">".$clang->gT("Questions").":</span><select class=\"listboxquestions\" name='qid' "
        . "onchange=\"window.open(this.options[this.selectedIndex].value, '_top')\">"
        . getQuestions($surveyid,$gid,$qid)
        . "</select>\n";


                // QUICK NAVIGATION TO PREVIOUS AND NEXT QUESTION
        // TODO: Fix functionality to previos and next question  buttons (Andrie)
        $QidPrev = getQidPrevious($surveyid, $gid, $qid);
        $groupsummary .= "<span class='arrow-wrapper'>";
        if ($QidPrev != "")
        {
          $groupsummary .= ""
            . "<a href='{$scriptname}?sid=$surveyid&amp;gid=$gid&amp;qid=$QidPrev'>"
            . "<img src='{$imageurl}/previous_20.png' title='' alt='".$clang->gT("Previous question")."' "
            ."name='questiongroupprevious'/></a>";
        }
        else
        {
          $groupsummary .= ""
            . "<img src='{$imageurl}/previous_disabled_20.png' title='' alt='".$clang->gT("No previous question")."' "
            ."name='noquestionprevious' />";
        }


        $QidNext = getQidNext($surveyid, $gid, $qid);
        if ($QidNext != "")
        {
          $groupsummary .= ""
            . "<a href='{$scriptname}?sid=$surveyid&amp;gid=$gid&amp;qid=$QidNext'>"
            . "<img src='{$imageurl}/next_20.png' title='' alt='".$clang->gT("Next question")."' "
            ."name='questionnext' /> </a>";
        }
        else
        {
          $groupsummary .= ""
            . "<img src='{$imageurl}/next_disabled_20.png' title='' alt='".$clang->gT("No next question")."' "
            ."name='noquestionnext' />";
        }
        $groupsummary .= "</span>";



        // ADD NEW QUESTION TO GROUP BUTTON

        if ($activated == "Y")
        {
            $groupsummary .= "<img src='$imageurl/add_disabled.png' title='' alt='".$clang->gT("Disabled").' - '.$clang->gT("This survey is currently active.")."' " .
            " name='AddNewQuestion' />\n";
        }
        elseif(bHasSurveyPermission($surveyid,'surveycontent','create'))
        {
            $groupsummary .= "<a href='$scriptname?action=addquestion&amp;sid=$surveyid&amp;gid=$gid'"
            ." title=\"".$clang->gTview("Add New Question to Group")."\" >"
            ."<img src='$imageurl/add.png' title='' alt='".$clang->gT("Add New Question to Group")."' " .
            " name='AddNewQuestion' onclick=\"window.open('', '_top')\" /></a>\n";
        }


        // Separator

        $groupsummary .= "<img src='$imageurl/seperator.gif' alt=''  />";

        $groupsummary.= "<img src='$imageurl/blank.gif' width='18' alt='' />"
        . "<input id='MinimizeGroupWindow' type='image' src='$imageurl/minus.gif' title='"
        . $clang->gT("Hide Details of this Group")."' alt='". $clang->gT("Hide Details of this Group")."' name='MinimizeGroupWindow' />\n";
        $groupsummary .= "<input type='image' id='MaximizeGroupWindow' src='$imageurl/plus.gif' title='"
        . $clang->gT("Show Details of this Group")."' alt='". $clang->gT("Show Details of this Group")."' name='MaximizeGroupWindow' />\n";
        if (!$qid)
        {
            $groupsummary .= "<input type='image' src='$imageurl/close.gif' title='"
            . $clang->gT("Close this Group")."' alt='". $clang->gT("Close this Group")."'  name='CloseSurveyWindow' "
            . "onclick=\"window.open('$scriptname?sid=$surveyid', '_top')\" />\n";
        }
        else
        {
            $groupsummary .= "<img src='$imageurl/blank.gif' alt='' width='18' />\n";
        }
        $groupsummary .="</div></div>\n"
        . "</div>\n";
        //  $groupsummary .= "<p style='margin:0;font-size:1px;line-height:1px;height:1px;'>&nbsp;</p>"; //CSS Firefox 2 transition fix

        if ($qid || $action=='editgroup'|| $action=='addquestion') {$gshowstyle="style='display: none'";}
        else	  {$gshowstyle="";}

        $groupsummary .= "<table id='groupdetails' $gshowstyle ><tr ><td width='20%' align='right'><strong>"
        . $clang->gT("Title").":</strong></td>\n"
        . "<td align='left'>"
        . "{$grow['group_name']} ({$grow['gid']})</td></tr>\n"
        . "<tr><td valign='top' align='right'><strong>"
        . $clang->gT("Description:")."</strong></td>\n<td align='left'>";
        if (trim($grow['description'])!='') {$groupsummary .=$grow['description'];}
        $groupsummary .= "</td></tr>\n";

        if (!is_null($condarray))
        {
            $groupsummary .= "<tr><td align='right'><strong>"
            . $clang->gT("Questions with conditions to this group").":</strong></td>\n"
            . "<td valign='bottom' align='left'>";
            foreach ($condarray[$gid] as $depgid => $deprow)
            {
                foreach ($deprow['conditions'] as $depqid => $depcid)
                {
                    //$groupsummary .= "[QID: ".$depqid."]";
                    $listcid=implode("-",$depcid);
                    $groupsummary .= " <a href='#' onclick=\"window.open('admin.php?sid=".$surveyid."&amp;gid=".$depgid."&amp;qid=".$depqid."&amp;action=conditions&amp;markcid=".$listcid."','_top')\">[QID: ".$depqid."]</a>";
                }
            }
            $groupsummary .= "</td></tr>";
        }
    }
    $groupsummary .= "\n</table>\n";
}

////////////////////////////////////////////////////////////////////////////////
// Question toolbar
////////////////////////////////////////////////////////////////////////////////


if (isset($surveyid) && $surveyid && $gid && $qid)  // Show the question toolbar
{
    // TODO: check that surveyid is set and that so is $baselang
    //Show Question Details
	//Count answer-options for this question
    $qrq = "SELECT * FROM ".db_table_name('answers')." WHERE qid=$qid AND language='".$baselang."' ORDER BY sortorder, answer";
    $qrr = $connect->Execute($qrq); //Checked
    $qct = $qrr->RecordCount();
	//Count sub-questions for this question
	$sqrq= "SELECT * FROM ".db_table_name('questions')." WHERE parent_qid=$qid AND language='".$baselang."'";
	$sqrr= $connect->Execute($sqrq); //Checked
	$sqct = $sqrr->RecordCount();

    $qrquery = "SELECT * FROM ".db_table_name('questions')." WHERE gid=$gid AND sid=$surveyid AND qid=$qid AND language='".$baselang."'";
    $qrresult = db_execute_assoc($qrquery) or safe_die($qrquery."<br />".$connect->ErrorMsg()); //Checked
    $questionsummary = "<div class='menubar'>\n";

    // Check if other questions in the Survey are dependent upon this question
    $condarray=GetQuestDepsForConditions($surveyid,"all","all",$qid,"by-targqid","outsidegroup");


    // PREVIEW THIS QUESTION BUTTON

    while ($qrrow = $qrresult->FetchRow())
    {
        $qrrow = array_map('FlattenText', $qrrow);
        //$qrrow = array_map('htmlspecialchars', $qrrow);
        $questionsummary .= "<div class='menubar-title ui-widget-header'>\n"
        . "<strong>". $clang->gT("Question")."</strong> <span class='basic'>{$qrrow['question']} (".$clang->gT("ID").":$qid)</span>\n"
        . "</div>\n"
        . "<div class='menubar-main'>\n"
        . "<div class='menubar-left'>\n"
        . "<img src='$imageurl/blank.gif' alt='' width='55' height='20' />\n"
        . "<img src='$imageurl/seperator.gif' alt='' />\n";
        if(bHasSurveyPermission($surveyid,'surveycontent','read'))
        {
            if (count(GetAdditionalLanguagesFromSurveyID($surveyid)) == 0)
            {
                $questionsummary .= "<a href=\"#\" accesskey='q' onclick=\"window.open('$scriptname?action=previewquestion&amp;sid=$surveyid&amp;qid=$qid', '_blank')\""
                . "title=\"".$clang->gTview("Preview This Question")."\">"
                . "<img src='$imageurl/preview.png' alt='".$clang->gT("Preview This Question")."' name='previewquestionimg' /></a>\n"
                . "<img src='$imageurl/seperator.gif' alt='' />\n";
            } else {
                $questionsummary .= "<a href=\"#\" accesskey='q' id='previewquestion'"
                . "title=\"".$clang->gTview("Preview This Question")."\">"
                . "<img src='$imageurl/preview.png' title='' alt='".$clang->gT("Preview This Question")."' name='previewquestionimg' /></a>\n"
                . "<img src='$imageurl/seperator.gif' alt=''  />\n";

                $tmp_survlangs = GetAdditionalLanguagesFromSurveyID($surveyid);
                $baselang = GetBaseLanguageFromSurveyID($surveyid);
                $tmp_survlangs[] = $baselang;
                rsort($tmp_survlangs);

                // Test question Language Selection Popup
                $surveysummary .="<div class=\"langpopup\" id=\"previewquestionpopup\">".$clang->gT("Please select a language:")."<ul>";
                foreach ($tmp_survlangs as $tmp_lang)
                {
                    $surveysummary .= "<li><a target='_blank' onclick=\"$('#previewquestion').qtip('hide');\" href='{$scriptname}?action=previewquestion&amp;sid={$surveyid}&amp;qid={$qid}&amp;lang={$tmp_lang}' accesskey='d'>".getLanguageNameFromCode($tmp_lang,false)."</a></li>";
                }
                $surveysummary .= "</ul></div>";
            }
        }

        // SEPARATOR

//        $questionsummary .= "<img src='$imageurl/blank.gif' alt='' width='117' height='20'  />\n";


        // EDIT CURRENT QUESTION BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','update'))
        {
            $questionsummary .= ""
//            ."<img src='$imageurl/seperator.gif' alt='' />\n"
            . "<a href='$scriptname?action=editquestion&amp;sid=$surveyid&amp;gid=$gid&amp;qid=$qid'"
            . " title=\"".$clang->gTview("Edit current question")."\">"
            . "<img src='$imageurl/edit.png' alt='".$clang->gT("Edit Current Question")."' name='EditQuestion' /></a>\n" ;
        }


        // DELETE CURRENT QUESTION BUTTON

        if ((($qct == 0 && $activated != "Y") || $activated != "Y") && bHasSurveyPermission($surveyid,'surveycontent','delete'))
        {
            if (is_null($condarray))
            {
                $questionsummary .= "<a href='#'" .
				"onclick=\"if (confirm('".$clang->gT("Deleting this question will also delete any answer options and subquestions it includes. Are you sure you want to continue?","js")."')) {".get2post("$scriptname?action=delquestion&amp;sid=$surveyid&amp;gid=$gid&amp;qid=$qid")."}\">"
				. "<img src='$imageurl/delete.png' name='DeleteWholeQuestion' alt='".$clang->gT("Delete current question")."' "
				. "border='0' hspace='0' /></a>\n";
            }
            else
            {
                $questionsummary .= "<a href='$scriptname?sid=$surveyid&amp;gid=$gid&amp;qid=$qid'" .
				"onclick=\"alert('".$clang->gT("It's impossible to delete this question because there is at least one question having a condition on it.","js")."')\""
				. "title=\"".$clang->gTview("Disabled - Delete current question")."\">"
				. "<img src='$imageurl/delete_disabled.png' name='DeleteWholeQuestion' alt='".$clang->gT("Disabled - Delete current question")."' /></a>\n";
            }
        }
        else {$questionsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";}


        // EXPORT CURRENT QUESTION BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','export'))
        {
            $questionsummary .= "<a href='$scriptname?action=exportstructureQuestion&amp;sid=$surveyid&amp;gid=$gid&amp;qid=$qid'"
            . " title=\"".$clang->gTview("Export this question")."\" >"
            . "<img src='$imageurl/dumpquestion.png' alt='".$clang->gT("Export this question")."' name='ExportQuestion' /></a>\n";
        }

        $questionsummary .= "<img src='$imageurl/seperator.gif' alt='' />\n";


        // COPY CURRENT QUESTION BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','create'))
        {
            if ($activated != "Y")
            {
                $questionsummary .= "<a href='$scriptname?action=copyquestion&amp;sid=$surveyid&amp;gid=$gid&amp;qid=$qid'"
                . " title=\"".$clang->gTview("Copy Current Question")."\" >"
                . "<img src='$imageurl/copy.png'  alt='".$clang->gT("Copy Current Question")."' name='CopyQuestion' /></a>\n"
                . "<img src='$imageurl/seperator.gif' alt='' />\n";
            }
            else
            {
                $questionsummary .= "<a href='#' title=\"".$clang->gTview("Copy Current Question")."\" "
                . "onclick=\"alert('".$clang->gT("You can't copy a question if the survey is active.","js")."')\">"
                . "<img src='$imageurl/copy_disabled.png' alt='".$clang->gT("Copy Current Question")."' name='CopyQuestion' /></a>\n"
                . "<img src='$imageurl/seperator.gif' alt='' />\n";
            }
        }
        else
        {
            $questionsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";
        }


        // SET EXTENDED CONDITIONS FOR QUESTION BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','update'))
        {
            $questionsummary .= "<a href='#' onclick=\"window.open('$scriptname?action=conditions&amp;sid=$surveyid&amp;qid=$qid&amp;gid=$gid&amp;subaction=editconditionsform', '_top')\""
            . " title=\"".$clang->gTview("Set/view conditions for this question")."\">"
            . "<img src='$imageurl/conditions.png' alt='".$clang->gT("Set conditions for this question")."'  name='SetQuestionConditions' /></a>\n"
            . "<img src='$imageurl/seperator.gif' alt='' />\n";
        }
        else
        {
            $questionsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";
        }


        // EDIT SUBQUESTIONS FOR THIS QUESTION BUTTON

        $qtypes=getqtypelist('','array');
        if(bHasSurveyPermission($surveyid,'surveycontent','read'))
        {
            if ($qtypes[$qrrow['type']]['subquestions'] >0)
            {
                $questionsummary .=  "<a href='".$scriptname."?action=editsubquestions&amp;sid=$surveyid&amp;gid=$gid&amp;qid=$qid'"
                ."title=\"".$clang->gTview("Edit subquestions for this question")."\">"
                ."<img src='$imageurl/subquestions.png' alt='".$clang->gT("Edit subquestions for this question")."' name='EditSubquestions' /></a>\n" ;
            }
        }
        else
        {
            $questionsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";
        }


        // EDIT ANSWER OPTIONS FOR THIS QUESTION BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','read') && $qtypes[$qrrow['type']]['answerscales'] >0)
        {
            $questionsummary .=  "<a href='".$scriptname."?action=editansweroptions&amp;sid=$surveyid&amp;gid=$gid&amp;qid=$qid'"
            ."title=\"".$clang->gTview("Edit answer options for this question")."\">"
            ."<img src='$imageurl/answers.png' alt='".$clang->gT("Edit answer options for this question")."' name='EditAnswerOptions' /></a>\n" ;
        }
        else
        {
            $questionsummary .= "<img src='$imageurl/blank.gif' alt='' width='40' />\n";
        }

<<<<<<< HEAD
=======
	foreach ($anslangs as $anslang)
	{
		$position=0;
    	$query = "SELECT * FROM ".db_table_name('answers')." WHERE qid='{$qid}' AND language='{$anslang}' ORDER BY sortorder, code";
		$result = db_execute_assoc($query) or die($connect->ErrorMsg());
		$anscount = $result->RecordCount();
        $vasummary .= "<div class='tab-page'>"
                ."<h2 class='tab'>".getLanguageNameFromCode($anslang, false);
        if ($anslang==GetBaseLanguageFromSurveyID($surveyid)) {$vasummary .= '('.$clang->gT("Base Language").')';}
                
        $vasummary .= "</h2>\t<table width='100%' style='border: solid; border-width: 0px; border-color: #555555' cellspacing='0'>\n"
                ."<thead align='center'>"
        		."<tr bgcolor='#F8F8FF'>\n"
        		."\t<td width='25%' align='right'><strong><font size='1' face='verdana' >\n"
        		.$clang->gT("Code")
        		."\t</font></strong></td>\n"
        		."\t<td width='35%'><strong><font size='1' face='verdana'>\n"
        		.$clang->gT("Answer")
        		."\t</font></strong></td>\n"
        		."\t<td width='25%'><strong><font size='1' face='verdana'>\n"
        		.$clang->gT("Action")
        		."\t</font></strong></td>\n"
        		."\t<td width='15%' align='center'><strong><font size='1' face='verdana'>\n"
        		.$clang->gT("Order")
        		."\t</font></strong>";
              	
        		
        		
                $vasummary .= "</td>\n"
        		."</tr></thead>"
                ."<tbody align='center'>";
		while ($row=$result->FetchRow())
		{
			$row['code'] = htmlspecialchars($row['code']);
			$row['answer']=htmlspecialchars($row['answer']);
			
			$sortorderids=$sortorderids.' '.$row['language'].'_'.$row['sortorder'];
			if ($first) {$codeids=$codeids.' '.$row['sortorder'];}
			
			$vasummary .= "<tr><td width='25%' align='right'>\n";
			if ($row['default_value'] == 'Y') $vasummary .= "<font color='#FF0000'>".$clang->gT("Default")."</font>";
>>>>>>> refs/heads/limesurvey16

        // EDIT DEFAULT ANSWERS FOR THIS QUESTION BUTTON

        if(bHasSurveyPermission($surveyid,'surveycontent','read') && $qtypes[$qrrow['type']]['hasdefaultvalues'] >0)
        {
            $questionsummary .=  "<a href='".$scriptname."?action=editdefaultvalues&amp;sid=$surveyid&amp;gid=$gid&amp;qid=$qid'"
            ."title=\"".$clang->gTview("Edit default answers for this question")."\">"
            ."<img src='$imageurl/defaultanswers.png' alt='".$clang->gT("Edit default answers for this question")."' name='EditDefaultAnswerOptions' /></a>\n" ;
        }
        $questionsummary .= "</div>\n"
        . "<div class='menubar-right'>\n"
        . "<input type='image' src='$imageurl/minus.gif' title='"
        . $clang->gT("Hide Details of this Question")."'  alt='". $clang->gT("Hide Details of this Question")."' name='MinimiseQuestionWindow' "
        . "onclick='document.getElementById(\"questiondetails\").style.display=\"none\";' />\n"
        . "<input type='image' src='$imageurl/plus.gif' title='"
        . $clang->gT("Show Details of this Question")."'  alt='". $clang->gT("Show Details of this Question")."' name='MaximiseQuestionWindow' "
        . "onclick='document.getElementById(\"questiondetails\").style.display=\"\";' />\n"
        . "<input type='image' src='$imageurl/close.gif' title='"
        . $clang->gT("Close this Question")."' alt='". $clang->gT("Close this Question")."' name='CloseQuestionWindow' "
        . "onclick=\"window.open('$scriptname?sid=$surveyid&amp;gid=$gid', '_top')\" />\n"
        . "</div>\n"
        . "</div>\n"
        . "</div>\n";
        $questionsummary .= "<p style='margin:0;font-size:1px;line-height:1px;height:1px;'>&nbsp;</p>"; //CSS Firefox 2 transition fix

        if ($action=='editansweroptions' || $action =="editsubquestions" || $action =="editquestion" || $action =="editdefaultvalues" || $action =="copyquestion")
        {
            $qshowstyle = "style='display: none'";
        }
        else
        {
            $qshowstyle = "";
        }
        $questionsummary .= "<table  id='questiondetails' $qshowstyle><tr><td width='20%' align='right'><strong>"
        . $clang->gT("Code:")."</strong></td>\n"
        . "<td align='left'>{$qrrow['title']}";
        if ($qrrow['type'] != "X")
        {
            if ($qrrow['mandatory'] == "Y") {$questionsummary .= ": (<i>".$clang->gT("Mandatory Question")."</i>)";}
            else {$questionsummary .= ": (<i>".$clang->gT("Optional Question")."</i>)";}
        }
        $questionsummary .= "</td></tr>\n"
        . "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Question:")."</strong></td>\n<td align='left'>".$qrrow['question']."</td></tr>\n"
        . "<tr><td align='right' valign='top'><strong>"
        . $clang->gT("Help:")."</strong></td>\n<td align='left'>";
        if (trim($qrrow['help'])!=''){$questionsummary .= $qrrow['help'];}
        $questionsummary .= "</td></tr>\n";
        if ($qrrow['preg'])
        {
            $questionsummary .= "<tr ><td align='right' valign='top'><strong>"
            . $clang->gT("Validation:")."</strong></td>\n<td align='left'>{$qrrow['preg']}"
            . "</td></tr>\n";
        }
        $qtypes = getqtypelist("", "array"); //qtypes = array(type code=>type description)
        $questionsummary .= "<tr><td align='right' valign='top'><strong>"
        .$clang->gT("Type:")."</strong></td>\n<td align='left'>{$qtypes[$qrrow['type']]['description']}";
        $questionsummary .="</td></tr>\n";
        if ($qct == 0 && $qtypes[$qrrow['type']]['answerscales'] >0)
        {
            $questionsummary .= "<tr ><td></td><td align='left'>"
            . "<span class='statusentryhighlight'>"
            . $clang->gT("Warning").": <a href='{$scriptname}?sid={$surveyid}&amp;gid={$gid}&amp;qid={$qid}&amp;action=editansweroptions'>". $clang->gT("You need to add answer options to this question")." "
            . "<img src='$imageurl/answers_20.png' title='"
            . $clang->gT("Edit answer options for this question")."' name='EditThisQuestionAnswers'/></span></td></tr>\n";
        }

        // EDIT SUBQUESTIONS FOR THIS QUESTION BUTTON
        if($sqct == 0 && $qtypes[$qrrow['type']]['subquestions'] >0)
        {
           $questionsummary .= "<tr ><td></td><td align='left'>"
            . "<span class='statusentryhighlight'>"
            . $clang->gT("Warning").": <a href='{$scriptname}?sid={$surveyid}&amp;gid={$gid}&amp;qid={$qid}&amp;action=editsubquestions'>". $clang->gT("You need to add subquestions to this question")." "
            . "<img src='$imageurl/subquestions_20.png' title='"
            . $clang->gT("Edit subquestions for this question")."' name='EditThisQuestionAnswers' /></span></td></tr>\n";
        }

        if ($qrrow['type'] == "M" or $qrrow['type'] == "P")
        {
            $questionsummary .= "<tr>"
            . "<td align='right' valign='top'><strong>"
            . $clang->gT("Option 'Other':")."</strong></td>\n"
            . "<td align='left'>";
            $questionsummary .= ($qrrow['other'] == "Y") ? ($clang->gT("Yes")) : ($clang->gT("No")) ;
            $questionsummary .= "</td></tr>\n";
        }
        if (isset($qrrow['mandatory']) and ($qrrow['type'] != "X") and ($qrrow['type'] != "|"))
        {
            $questionsummary .= "<tr>"
            . "<td align='right' valign='top'><strong>"
            . $clang->gT("Mandatory:")."</strong></td>\n"
            . "<td align='left'>";
            $questionsummary .= ($qrrow['mandatory'] == "Y") ? ($clang->gT("Yes")) : ($clang->gT("No")) ;
            $questionsummary .= "</td></tr>\n";
        }
        if (!is_null($condarray))
        {
            $questionsummary .= "<tr>"
            . "<td align='right' valign='top'><strong>"
            . $clang->gT("Other questions having conditions on this question:")
            . "</strong></td>\n<td align='left' valign='bottom'>\n";
            foreach ($condarray[$qid] as $depqid => $depcid)
            {
                $listcid=implode("-",$depcid);
                $questionsummary .= " <a href='#' onclick=\"window.open('admin.php?sid=".$surveyid."&amp;qid=".$depqid."&amp;action=conditions&amp;markcid=".$listcid."','_top')\">[QID: ".$depqid."]</a>";
            }
            $questionsummary .= "</td></tr>";
        }
        $questionsummary .= "</table>";
    }
}

// ============= EDIT ANSWER OPTIONS=====================================


if ($action=='editansweroptions')
{
  include("editansweroptions.php");
}


// ============= EDIT SUBQUESTIONS ======================================

if ($action=='editsubquestions')
{
  include("editsubquestions.php");
}



// *************************************************
// Survey Rights Start	****************************
// *************************************************

if($action == "addsurveysecurity")
{
    $addsummary = "<div class='header ui-widget-header'>".$clang->gT("Add User")."</div>\n";
    $addsummary .= "<div class=\"messagebox ui-corner-all\">\n";

    $query = "SELECT sid, owner_id FROM ".db_table_name('surveys')." WHERE sid = {$surveyid} AND owner_id = ".$_SESSION['loginID']." AND owner_id != ".$postuserid;
    $result = db_execute_assoc($query); //Checked
    if( ($result->RecordCount() > 0 && in_array($postuserid,getuserlist('onlyuidarray'))) ||
    $_SESSION['USER_RIGHT_SUPERADMIN'] == 1)
    {

        if($postuserid > 0){

            $isrquery = "INSERT INTO {$dbprefix}survey_permissions (sid,uid,permission,read_p) VALUES ({$surveyid},{$postuserid},'survey',1)";
            $isrresult = $connect->Execute($isrquery); //Checked

            if($isrresult)
            {
                $addsummary .= "<div class=\"successheader\">".$clang->gT("User added.")."</div>\n";
                $addsummary .= "<br /><form method='post' action='$scriptname?sid={$surveyid}'>"
                ."<input type='submit' value='".$clang->gT("Set survey permissions")."' />"
                ."<input type='hidden' name='action' value='setsurveysecurity' />"
                ."<input type='hidden' name='uid' value='{$postuserid}' />"
                ."</form>\n";
            }
            else
            {
                // Username already exists.
                $addsummary .= "<div class=\"warningheader\">".$clang->gT("Failed to add user.")."</div>\n"
                . "<br />" . $clang->gT("Username already exists.")."<br />\n";
                $addsummary .= "<br/><input type=\"submit\" onclick=\"window.open('$scriptname?sid={$surveyid}&amp;action=surveysecurity', '_top')\" value=\"".$clang->gT("Continue")."\"/>\n";
            }
        }
        else
        {
            $addsummary .= "<div class=\"warningheader\">".$clang->gT("Failed to add user.")."</div>\n"
            . "<br />" . $clang->gT("No Username selected.")."<br />\n";
            $addsummary .= "<br/><input type=\"submit\" onclick=\"window.open('$scriptname?sid={$surveyid}&amp;action=surveysecurity', '_top')\" value=\"".$clang->gT("Continue")."\"/>\n";
        }
    }
    else
    {
        include("access_denied.php");
    }
    $addsummary .= "</div>\n";
}


if($action == "addusergroupsurveysecurity")
{
    $addsummary = "<div class=\"header\">".$clang->gT("Add user group")."</div>\n";
    $addsummary .= "<div class=\"messagebox ui-corner-all\" >\n";

    $query = "SELECT sid, owner_id FROM ".db_table_name('surveys')." WHERE sid = {$surveyid} AND owner_id = ".$_SESSION['loginID'];
    $result = db_execute_assoc($query); //Checked
    if( ($result->RecordCount() > 0 && in_array($postusergroupid,getsurveyusergrouplist('simpleugidarray'))) || $_SESSION['USER_RIGHT_SUPERADMIN'] == 1)
    {
        if($postusergroupid > 0){
            $query2 = "SELECT b.uid FROM (SELECT uid FROM ".db_table_name('survey_permissions')." WHERE sid = {$surveyid}) AS c RIGHT JOIN ".db_table_name('user_in_groups')." AS b ON b.uid = c.uid WHERE c.uid IS NULL AND b.ugid = {$postusergroupid}";
            $result2 = db_execute_assoc($query2); //Checked
            if($result2->RecordCount() > 0)
            {
                while ($row2 = $result2->FetchRow())
                {
                    $uid_arr[] = $row2['uid'];
                    $isrquery = "INSERT INTO {$dbprefix}survey_permissions (sid,uid,permission,read_p) VALUES ({$surveyid}, {$row2['uid']},'survey',1) ";
                    $isrresult = $connect->Execute($isrquery); //Checked
                    if (!$isrresult) break;
                }

                if($isrresult)
                {
                    $addsummary .= "<div class=\"successheader\">".$clang->gT("User Group added.")."</div>\n";
                    $_SESSION['uids'] = $uid_arr;
                    $addsummary .= "<br /><form method='post' action='$scriptname?sid={$surveyid}'>"
                    ."<input type='submit' value='".$clang->gT("Set Survey Rights")."' />"
                    ."<input type='hidden' name='action' value='setusergroupsurveysecurity' />"
                    ."<input type='hidden' name='ugid' value='{$postusergroupid}' />"
                    ."</form>\n";
                }
                else
                {
                    // Error while adding user to the database
                    $addsummary .= "<div class=\"warningheader\">".$clang->gT("Failed to add User Group.")."</div>\n";
                    $addsummary .= "<br/><input type=\"submit\" onclick=\"window.open('$scriptname?action=surveysecurity&amp;sid={$surveyid}', '_top')\" value=\"".$clang->gT("Continue")."\"/>\n";
                }
            }
            else
            {
                // no user to add
                $addsummary .= "<div class=\"warningheader\">".$clang->gT("Failed to add User Group.")."</div>\n";
                $addsummary .= "<br/><input type=\"submit\" onclick=\"window.open('$scriptname?action=surveysecurity&amp;sid={$surveyid}', '_top')\" value=\"".$clang->gT("Continue")."\"/>\n";
            }
        }
        else
        {
            $addsummary .= "<div class=\"warningheader\">".$clang->gT("Failed to add user.")."</div>\n"
            . "<br />" . $clang->gT("No Username selected.")."<br />\n";
            $addsummary .= "<br/><input type=\"submit\" onclick=\"window.open('$scriptname?action=surveysecurity&amp;sid={$surveyid}', '_top')\" value=\"".$clang->gT("Continue")."\"/>\n";
        }
    }
    else
    {
        include("access_denied.php");
    }
    $addsummary .= "</div>\n";
}

if($action == "delsurveysecurity")
{
    $addsummary = "<div class=\"header\">".$clang->gT("Deleting User")."</div>\n";
    $addsummary .= "<div class=\"messagebox\">\n";

    $query = "SELECT sid, owner_id FROM ".db_table_name('surveys')." WHERE sid = {$surveyid} AND owner_id = ".$_SESSION['loginID']." AND owner_id != ".$postuserid;
    $result = db_execute_assoc($query); //Checked
    if($result->RecordCount() > 0 || $_SESSION['USER_RIGHT_SUPERADMIN'] == 1)
    {
        if (isset($postuserid))
        {
            $dquery="DELETE FROM".db_table_name('survey_permissions')." WHERE uid={$postuserid} AND sid={$surveyid}";	//	added by Dennis
            $dresult=$connect->Execute($dquery); //Checked

            $addsummary .= "<br />".$clang->gT("Username").": ".sanitize_xss_string($_POST['user'])."<br /><br />\n";
            $addsummary .= "<div class=\"successheader\">".$clang->gT("Success!")."</div>\n";
        }
        else
        {
            $addsummary .= "<div class=\"warningheader\">".$clang->gT("Could not delete user. User was not supplied.")."</div>\n";
        }
        $addsummary .= "<br/><input type=\"submit\" onclick=\"window.open('$scriptname?sid={$surveyid}&amp;action=surveysecurity', '_top')\" value=\"".$clang->gT("Continue")."\"/>\n";
    }
    else
    {
        include("access_denied.php");
    }
    $addsummary .= "</div>\n";
}

if($action == "setsurveysecurity" || $action == "setusergroupsurveysecurity")
{
    $query = "SELECT sid, owner_id FROM ".db_table_name('surveys')." WHERE sid = {$surveyid} AND owner_id = ".$_SESSION['loginID'];
    if ($action == "setsurveysecurity")
    {
      $query.=  " AND owner_id != ".$postuserid;
    }
    $result = db_execute_assoc($query); //Checked
    if($result->RecordCount() > 0 || $_SESSION['USER_RIGHT_SUPERADMIN'] == 1)
    {
        $js_admin_includes[]='../scripts/jquery/jquery.tablesorter.min.js';
        $js_admin_includes[]='scripts/surveysecurity.js';
        if ($action == "setsurveysecurity")
        {
            $sUsername=$connect->GetOne("select users_name from ".db_table_name('users')." where uid={$postuserid}");
            $usersummary = "<div class='header ui-widget-header'>".sprintf($clang->gT("Edit survey permissions for user %s"),"<span style='font-style:italic'>".$sUsername."</span>")."</div>";
        }
        else
        {
            $sUsergroupName=$connect->GetOne("select name from ".db_table_name('user_groups')." where ugid={$postusergroupid}");
            $usersummary = "<div class='header ui-widget-header'>".sprintf($clang->gT("Edit survey permissions for group %s"),"<span style='font-style:italic'>".$sUsergroupName."</span>")."</div>";
        }
        $usersummary .= "<br /><form action='$scriptname?sid={$surveyid}' method='post'>\n"
        . "<table style='margin:0 auto;' border='0' class='usersurveypermissions'><thead>\n";

        $usersummary .= ""
        . "<tr><th></th><th align='center'>".$clang->gT("Permission")."</th>\n"
        . "<th align='center'><input type='button' id='btnToggleAdvanced' value='&gt;&gt;' /></th>\n"
        . "<th align='center' class='extended'>".$clang->gT("Create")."</th>\n"
        . "<th align='center' class='extended'>".$clang->gT("View/read")."</th>\n"
        . "<th align='center' class='extended'>".$clang->gT("Update")."</th>\n"
        . "<th align='center' class='extended'>".$clang->gT("Delete")."</th>\n"
        . "<th align='center' class='extended'>".$clang->gT("Import")."</th>\n"
        . "<th align='center' class='extended'>".$clang->gT("Export")."</th>\n"
        . "</tr></thead>\n";

        //content

        $aBasePermissions=aGetBaseSurveyPermissions();
        $oddcolumn=false;
        foreach($aBasePermissions as $sPermissionKey=>$aCRUDPermissions)
        {
            $oddcolumn=!$oddcolumn;
            $usersummary .= "<tr><td align='center'><img src='{$imageurl}/{$aCRUDPermissions['img']}_30.png' /></td>";
            $usersummary .= "<td align='right'>{$aCRUDPermissions['title']}</td>";
            $usersummary .= "<td  align='center'><input type=\"checkbox\"  class=\"markrow\" name='all_{$sPermissionKey}' /></td>";
            foreach ($aCRUDPermissions as $sCRUDKey=>$CRUDValue)
            {
                if (!in_array($sCRUDKey,array('create','read','update','delete','import','export'))) continue;
                $usersummary .= "<td class='extended' align='center'>";

                if ($CRUDValue)
                {
                    if (!($sPermissionKey=='survey' && $sCRUDKey=='read'))
                    {
                        $usersummary .= "<input type=\"checkbox\"  class=\"checkboxbtn\" name='perm_{$sPermissionKey}_{$sCRUDKey}' ";
                        if($action=='setsurveysecurity' && bHasSurveyPermission( $surveyid,$sPermissionKey,$sCRUDKey,$postuserid)) {
                            $usersummary .= ' checked="checked" ';
                        }
                        $usersummary .=" />";
                    }
                }
                $usersummary .= "</td>";
            }
            $usersummary .= "</tr>";
        }

        $usersummary .= "\n</table>"
        ."<p><input type='submit' value='".$clang->gT("Save Now")."' />"
        ."<input type='hidden' name='perm_survey_read' value='1' />"
        ."<input type='hidden' name='action' value='surveyrights' />";

        if ($action=='setsurveysecurity')
        {
            $usersummary .="<input type='hidden' name='uid' value='{$postuserid}' />";
        }
        else
        {
            $usersummary .="<input type='hidden' name='ugid' value='{$postusergroupid}' />";
        }
        $usersummary .= "</form>\n";
    }
    else
    {
        include("access_denied.php");
    }
}

// This is the action to export the structure of a complete survey
if($action == "exportstructure")
{
    if(bHasSurveyPermission($surveyid,'surveycontent','export'))
    {
        $exportstructure = "<form id='exportstructure' name='exportstructure' action='$scriptname' method='post'>\n"
        ."<div class='header ui-widget-header'>"
        .$clang->gT("Export Survey Structure")."\n</div><br />\n"
        ."<ul style='margin-left:35%;'>\n"
        ."<li><input type='radio' class='radiobtn' name='action' value='exportstructurexml' checked='checked' id='surveyxml'"
        ."<label for='surveycsv'>"
        .$clang->gT("LimeSurvey XML survey file (*.lss)")."</label></li>\n";

	    $exportstructure.="<li><input type='radio' class='radiobtn' name='action' value='exportstructurequexml'  id='queXML'"
	    ."<label for='queXML'>"
	    .str_replace('queXML','<a href="http://quexml.sourceforge.net/" target="_blank">queXML</a>',$clang->gT("queXML Survey XML Format (*.xml)"))." "
	    ."</label></li>\n";

	    // XXX
	    //include("../config.php");

	    //echo $export4lsrc;
	    if($export4lsrc)
	    {
	        $exportstructure.="<li><input type='radio' class='radiobtn' name='type' value='structureLsrcCsv'  id='LsrcCsv'
		    onclick=\"this.form.action.value='exportstructureLsrcCsv'\" />"
		    ."<label for='LsrcCsv'>"
		    .$clang->gT("Save for Lsrc (*.csv)")." "
		    ."</label></li>";
	    }
	    $exportstructure.="</ul>\n";

	    $exportstructure.="<p>\n"
	    ."<input type='submit' value='"
	    .$clang->gT("Export To File")."' />\n"
	    ."<input type='hidden' name='sid' value='$surveyid' />\n";
	    $exportstructure.="</form>\n";
    }
}

// This is the action to export the structure of a group
if($action == "exportstructureGroup")
{
    if($export4lsrc === true && bHasSurveyPermission($surveyid,'survey','export'))
    {
        $exportstructure = "<form id='exportstructureGroup' name='exportstructureGroup' action='$scriptname' method='post'>\n"
        ."<div class='header ui-widget-header'>".$clang->gT("Export group structure")."\n</div>\n"
        ."<ul>\n"
        ."<li>\n";
        $exportstructure.="<input type='radio' class='radiobtn' name='type' value='structurecsvGroup' checked='checked' id='surveycsv'
	    onclick=\"this.form.action.value='exportstructurecsvGroup'\"/>"
	    ."<label for='surveycsv'>"
	    .$clang->gT("LimeSurvey group file (*.csv)")."</label></li>\n";

	    //	    $exportstructure.="<input type='radio' class='radiobtn' name='type' value='structurequeXMLGroup'  id='queXML' onclick=\"this.form.action.value='exportstructurequexml'\" />"
	    //	    ."<label for='queXML'>"
	    //	    .$clang->gT("queXML Survey XML Format (*.xml)")." "
	    //	    ."</label>\n";

	    // XXX
	    //include("../config.php");

	    //echo $export4lsrc;
	    if($export4lsrc)
	    {
	        $exportstructure.="<li><input type='radio' class='radiobtn' name='type' value='structureLsrcCsvGroup'  id='LsrcCsv'
		    onclick=\"this.form.action.value='exportstructureLsrcCsvGroup'\" />"
		    ."<label for='LsrcCsv'>"
		    .$clang->gT("Save for Lsrc (*.csv)")." "
		    ."</label></li>\n";
	    }

	    $exportstructure.="</ul>\n"
	    ."<p>\n"
	    ."<input type='submit' value='"
	    .$clang->gT("Export to file")."' />\n"
	    ."<input type='hidden' name='sid' value='$surveyid' />\n"
	    ."<input type='hidden' name='gid' value='$gid' />\n"
	    ."<input type='hidden' name='action' value='exportstructurecsvGroup' />\n";
	    $exportstructure.="</form>\n";
    }
    else
    {
        include('dumpgroup.php');
    }
}

// This is the action to export the structure of a question
if($action == "exportstructureQuestion")
{
    if($export4lsrc === true && bHasSurveyPermission($surveyid,'survey','export'))
    {
        $exportstructure = "<form id='exportstructureQuestion' name='exportstructureQuestion' action='$scriptname' method='post'>\n"
        ."<div class='header ui-widget-header'>".$clang->gT("Export question structure")."\n</div>\n"
        ."<ul>\n"
        ."<li>\n";
        $exportstructure.="<input type='radio' class='radiobtn' name='type' value='structurecsvQuestion' checked='checked' id='surveycsv'
	    onclick=\"this.form.action.value='exportstructurecsvQuestion'\"/>"
	    ."<label for='surveycsv'>"
	    .$clang->gT("LimeSurvey group file (*.csv)")."</label></li>\n";

	    //	    $exportstructure.="<input type='radio' class='radiobtn' name='type' value='structurequeXMLGroup'  id='queXML' onclick=\"this.form.action.value='exportstructurequexml'\" />"
	    //	    ."<label for='queXML'>"
	    //	    .$clang->gT("queXML Survey XML Format (*.xml)")." "
	    //	    ."</label>\n";

	    // XXX
	    //include("../config.php");

	    //echo $export4lsrc;
	    if($export4lsrc)
	    {
	        $exportstructure.="<li><input type='radio' class='radiobtn' name='type' value='structureLsrcCsvQuestion'  id='LsrcCsv'
		    onclick=\"this.form.action.value='exportstructureLsrcCsvQuestion'\" />"
		    ."<label for='LsrcCsv'>"
		    .$clang->gT("Save for Lsrc (*.csv)")." "
		    ."</label></li>\n";
	    }

	    $exportstructure.="</ul>\n"
	    ."<p>\n"
	    ."<input type='submit' value='"
	    .$clang->gT("Export to file")."' />\n"
	    ."<input type='hidden' name='sid' value='$surveyid' />\n"
	    ."<input type='hidden' name='gid' value='$gid' />\n"
	    ."<input type='hidden' name='qid' value='$qid' />\n"
	    ."<input type='hidden' name='action' value='exportstructurecsvQuestion' />\n";
	    $exportstructure.="</form>\n";
    }
    else
    {
        include('dumpquestion.php');
    }
}

if($action == "surveysecurity")
{
    if(bHasSurveyPermission($surveyid,'survey','read'))
    {
        $aBaseSurveyPermissions=aGetBaseSurveyPermissions();
        $js_admin_includes[]='../scripts/jquery/jquery.tablesorter.min.js';
        $js_admin_includes[]='scripts/surveysecurity.js';

        $query2 = "SELECT p.sid, p.uid, u.users_name, u.full_name FROM ".db_table_name('survey_permissions')." AS p INNER JOIN ".db_table_name('users')."  AS u ON p.uid = u.uid
                   WHERE p.sid = {$surveyid} AND u.uid != ".$_SESSION['loginID'] ."
                    GROUP BY p.sid, p.uid, u.users_name, u.full_name
                   ORDER BY u.users_name";
        $result2 = db_execute_assoc($query2); //Checked

        $surveysecurity ="<div class='header ui-widget-header'>".$clang->gT("Survey permissions")."</div>\n"
        . "<table class='surveysecurity'><thead>"
        . "<tr>\n"
        . "<th>".$clang->gT("Action")."</th>\n"
        . "<th>".$clang->gT("Username")."</th>\n"
        . "<th>".$clang->gT("User Group")."</th>\n"
        . "<th>".$clang->gT("Full name")."</th>\n";
        foreach ($aBaseSurveyPermissions as $sPermission=>$aSubPermissions )
        {
            $surveysecurity.="<th align=\"center\"><img src=\"{$imageurl}/{$aSubPermissions['img']}_30.png\" alt=\"<span style='font-weight:bold;'>".$aSubPermissions['title']."</span><br />".$aSubPermissions['description']."\" /></th>\n";
        }
        $surveysecurity .= "</tr></thead>\n";

        // Foot first

        if (isset($usercontrolSameGroupPolicy) &&
        $usercontrolSameGroupPolicy == true)
        {
            $authorizedGroupsList=getusergrouplist('simplegidarray');
        }

        $surveysecurity .= "<tbody>\n";
        if($result2->RecordCount() > 0)
        {
            //	output users
            $row = 0;
            while ($PermissionRow = $result2->FetchRow())
            {

                $query3 = "SELECT a.ugid FROM ".db_table_name('user_in_groups')." AS a RIGHT OUTER JOIN ".db_table_name('users')." AS b ON a.uid = b.uid WHERE b.uid = ".$PermissionRow['uid'];
                $result3 = db_execute_assoc($query3); //Checked
                while ($resul3row = $result3->FetchRow())
                {
                    if (!isset($usercontrolSameGroupPolicy) ||
                    $usercontrolSameGroupPolicy == false ||
                    in_array($resul3row['ugid'],$authorizedGroupsList))
                    {
                        $group_ids[] = $resul3row['ugid'];
                    }
                }

                if(isset($group_ids) && $group_ids[0] != NULL)
                {
                    $group_ids_query = implode(" OR ugid=", $group_ids);
                    unset($group_ids);

                    $query4 = "SELECT name FROM ".db_table_name('user_groups')." WHERE ugid = ".$group_ids_query;
                    $result4 = db_execute_assoc($query4); //Checked

                    while ($resul4row = $result4->FetchRow())
                    {
                        $group_names[] = $resul4row['name'];
                    }
                    if(count($group_names) > 0)
                    $group_names_query = implode(", ", $group_names);
                }
                //                  else {break;} //TODO Commented by lemeur
                $surveysecurity .= "<tr>\n";

                $surveysecurity .= "<td>\n";
                $surveysecurity .= "<form style='display:inline;' method='post' action='$scriptname?sid={$surveyid}'>"
                ."<input type='image' src='{$imageurl}/token_edit.png' title='".$clang->gT("Edit permissions")."' />"
                ."<input type='hidden' name='action' value='setsurveysecurity' />"
                ."<input type='hidden' name='user' value='{$PermissionRow['users_name']}' />"
                ."<input type='hidden' name='uid' value='{$PermissionRow['uid']}' />"
                ."</form>\n";
                $surveysecurity .= "<form style='display:inline;' method='post' action='$scriptname?sid={$surveyid}'>"
                ."<input type='image' src='{$imageurl}/token_delete.png' title='".$clang->gT("Delete")."' onclick='return confirm(\"".$clang->gT("Are you sure you want to delete this entry?","js")."\")' />"
                ."<input type='hidden' name='action' value='delsurveysecurity' />"
                ."<input type='hidden' name='user' value='{$PermissionRow['users_name']}' />"
                ."<input type='hidden' name='uid' value='{$PermissionRow['uid']}' />"
                ."</form>";

<<<<<<< HEAD
=======
// Editing the survey
if ($action == "editsurvey")
{
	if($sumrows5['edit_survey_property'])
	{
		$esquery = "SELECT * FROM {$dbprefix}surveys WHERE sid=$surveyid";
		$esresult = db_execute_assoc($esquery);
		while ($esrow = $esresult->FetchRow())
		{
			$esrow = array_map('htmlspecialchars', $esrow);
			$editsurvey = include2var('./scripts/addremove.js');
<<<<<<< HEAD
			$editsurvey .= "<form name='addnewsurvey' action='$scriptname' method='post'>\n<table width='100%' border='0'>\n\t<tr><td colspan='4' class='settingcaption'>"
=======
			$editsurvey .= "<form name='addnewsurvey' action='$scriptname' method='post'>\n<table width='100%' border='0' class='table2columns'>\n\t<tr><td colspan='4' class='settingcaption'>"
>>>>>>> refs/heads/limesurvey16
			. "\t\t".$clang->gT("Edit Survey - Step 1 of 2")."</td></tr>\n"
			. "\t<tr><td align='right'>".$clang->gT("Administrator:")."</td>\n"
			. "\t\t<td align='left'><input type='text' size='50' name='admin' value=\"{$esrow['admin']}\" /></td></tr>\n"
			. "\t<tr><td align='right'>".$clang->gT("Admin Email:")."</td>\n"
			. "\t\t<td align='left'><input type='text' size='50' name='adminemail' value=\"{$esrow['adminemail']}\" /></td></tr>\n"
			. "\t<tr><td align='right'>".$clang->gT("Fax To:")."</td>\n"
			. "\t\t<td align='left'><input type='text' size='50' name='faxto' value=\"{$esrow['faxto']}\" /></td></tr>\n";
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Format:")."</td>\n"
			. "\t\t<td align='left'><select name='format'>\n"
			. "\t\t\t<option value='S'";
			if ($esrow['format'] == "S" || !$esrow['format']) {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Question by Question")."</option>\n"
			. "\t\t\t<option value='G'";
			if ($esrow['format'] == "G") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Group by Group")."</option>\n"
			. "\t\t\t<option value='A'";
			if ($esrow['format'] == "A") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("All in one")."</option>\n"
			. "\t\t</select></td>\n"
			. "\t</tr>\n";
			//TEMPLATES
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Template:")."</td>\n"
			. "\t\t<td align='left'><select name='template'>\n";
			foreach (gettemplatelist() as $tname)
			{
				$editsurvey .= "\t\t\t<option value='$tname'";
				if ($esrow['template'] && htmlspecialchars($tname) == $esrow['template']) {$editsurvey .= " selected='selected'";}
				elseif (!$esrow['template'] && $tname == "default") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">$tname</option>\n";
			}
			$editsurvey .= "\t\t</select></td>\n"
			. "\t</tr>\n";
			//COOKIES
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Use Cookies?")."</td>\n"
			. "\t\t<td align='left'><select name='usecookie'>\n"
			. "\t\t\t<option value='Y'";
			if ($esrow['usecookie'] == "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
			. "\t\t\t<option value='N'";
			if ($esrow['usecookie'] != "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("No")."</option>\n"
			. "\t\t</select></td>\n"
			. "\t</tr>\n";
			//ALLOW SAVES
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Allow Saves?")."</td>\n"
			. "\t\t<td align='left'><select name='allowsave'>\n"
			. "\t\t\t<option value='Y'";
			if (!$esrow['allowsave'] || $esrow['allowsave'] == "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
			. "\t\t<option value='N'";
			if ($esrow['allowsave'] == "N") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("No")."</option>\n"
			. "\t\t</select></td>\n"
			. "\t</tr>\n";
			//ALLOW PREV
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Show [<< Prev] button")."</td>\n"
			. "\t\t<td align='left'><select name='allowprev'>\n"
			. "\t\t\t<option value='Y'";
			if (!isset($esrow['allowprev']) || !$esrow['allowprev'] || $esrow['allowprev'] == "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
			. "\t\t<option value='N'";
			if (isset($esrow['allowprev']) && $esrow['allowprev'] == "N") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("No")."</option>\n"
			. "\t\t</select></td>\n"
			. "\t</tr>\n";
			//NOTIFICATION
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Admin Notification:")."</td>\n"
			. "\t\t<td align='left'><select name='notification'>\n"
			. getNotificationlist($esrow['notification'])
			. "\t\t</select></td>\n"
			. "\t</tr>\n";
			//ANONYMOUS
<<<<<<< HEAD
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Anonymous answers?")."\n";
			  // warning message if anonymous + datestamped anwsers
			$editsurvey .= "\n"
			. "\t<script type=\"text/javascript\"><!-- \n"
			. "\tfunction alertPrivacy()\n"
			. "\t{"
			. "\t\tif (document.getElementById('private').value == 'Y')\n"
			. "\t\t{\n"
			. "\t\t\talert('".$clang->gT("Warning").": ".$clang->gT("If you turn on the -Anonymous answers- option and create a tokens table, LimeSurvey will mark your completed tokens only with a 'Y' instead of date/time to ensure the anonymity of your participants.","js")."');\n"
			. "\t\t}\n"
			. "\t}"
			. "\t//--></script></td>\n";
>>>>>>> refs/heads/stable_plus

                $surveysecurity .= "</td>\n";
                $surveysecurity .= "<td>{$PermissionRow['users_name']}</td>\n"
                . "<td>";

                if(isset($group_names) > 0)
                {
                    $surveysecurity .= $group_names_query;
                }
                else
                {
                    $surveysecurity .= "---";
                }
                unset($group_names);

                $surveysecurity .= "</td>\n"
                . "<td>\n{$PermissionRow['full_name']}</td>\n";

                //Now show the permissions
                foreach ($aBaseSurveyPermissions as $sPKey=>$aPDetails) {
                    unset($aPDetails['img']);
                    unset($aPDetails['description']);
                    unset($aPDetails['title']);
                    $iCount=0;
                    $iPermissionCount=0;
                    foreach ($aPDetails as $sPDetailKey=>$sPDetailValue)
                    {
                        if ($sPDetailValue && bHasSurveyPermission($surveyid,$sPKey,$sPDetailKey,$PermissionRow['uid']) && !($sPKey=='survey' && $sPDetailKey=='read')) $iCount++;
                        if ($sPDetailValue) $iPermissionCount++;
                    }
                    if ($sPKey=='survey')  $iPermissionCount--;
                    if ($iCount==$iPermissionCount) {
                        $insert = "<div class=\"ui-icon ui-icon-check\">&nbsp;</div>";
                    }
                    elseif ($iCount>0){
                        $insert = "<div class=\"ui-icon ui-icon-check mixed\">&nbsp;</div>";
                    }
                    else
                    {
                        $insert = "<div>&nbsp;</div>";
                    }
                    $surveysecurity .= "<td align=\"center\">\n$insert\n</td>\n";
                }

                $surveysecurity .= "</tr>\n";
                $row++;
            }
        } else {
            $surveysecurity .= "<tr><td colspan='18'></td></tr>"; //fix error on empty table
        }
        $surveysecurity .= "</tbody>\n"
        . "</table>\n"
        . "<form class='form44' action='$scriptname?sid={$surveyid}' method='post'><ul>\n"
        . "<li><label for='uidselect'>".$clang->gT("User").": </label><select id='uidselect' name='uid'>\n"
        . sGetSurveyUserlist(false,false)
        . "</select>\n"
        . "<input style='width: 15em;' type='submit' value='".$clang->gT("Add User")."'  onclick=\"if (document.getElementById('uidselect').value == -1) {alert('".$clang->gT("Please select a user first","js")."'); return false;}\"/>"
        . "<input type='hidden' name='action' value='addsurveysecurity' />"
        . "</li></ul></form>\n"
        . "<form class='form44' action='$scriptname?sid={$surveyid}' method='post'><ul><li>\n"
        . "<label for='ugidselect'>".$clang->gT("Groups").": </label><select id='ugidselect' name='ugid'>\n"
        . getsurveyusergrouplist()
        . "</select>\n"
        . "<input style='width: 15em;' type='submit' value='".$clang->gT("Add User Group")."' onclick=\"if (document.getElementById('ugidselect').value == -1) {alert('".$clang->gT("Please select a user group first","js")."'); return false;}\" />"
        . "<input type='hidden' name='action' value='addusergroupsurveysecurity' />\n"
        . "</li></ul></form>";
=======
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Anonymous?")."</td>\n";
			if ($esrow['active'] == "Y")
			{
				$editsurvey .= "\t\t<td align='left'>\n\t\t\t";
				if ($esrow['private'] == "N") {$editsurvey .= " ".$clang->gT("This survey is NOT anonymous.");}
				else {$editsurvey .= $clang->gT("This survey is anonymous.");}
				$editsurvey .= "<font size='1' color='red'>&nbsp;(".$clang->gT("Cannot be changed").")\n"
				. "\t\t</font>\n";
				$editsurvey .= "<input type='hidden' name='private' value=\"{$esrow['private']}\" /></td>\n";
			}
			else
			{
				$editsurvey .= "\t\t<td align='left'><select name='private'>\n"
				. "\t\t\t<option value='Y'";
				if ($esrow['private'] == "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
				. "\t\t\t<option value='N'";
				if ($esrow['private'] != "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("No")."</option>\n"
				. "</select>\n\t\t</td>\n";
			}
			$editsurvey .= "</tr>\n";
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Allow public registration?")."</td>\n"
			. "\t\t<td align='left'><select name='allowregister'>\n"
			. "\t\t\t<option value='Y'";
			if ($esrow['allowregister'] == "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
			. "\t\t\t<option value='N'";
			if ($esrow['allowregister'] != "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("No")."</option>\n"
			. "\t\t</select></td>\n\t</tr>\n";
			$editsurvey .= "\t<tr><td align='right' valign='top'>".$clang->gT("Token Attribute Names:")."</td>\n"
			. "\t\t<td align='left'><input type='text' size='25' name='attribute1'"
			. " value=\"{$esrow['attribute1']}\" />(".$clang->gT("Attribute 1").")<br />"
			. "<input type='text' size='25' name='attribute2'"
			. " value=\"{$esrow['attribute2']}\" />(".$clang->gT("Attribute 2").")</td>\n\t</tr>\n";
			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Date Stamp?")."</td>\n";

			if ($esrow['active'] == "Y")
			{
				$editsurvey .= "\t\t<td align='left'>\n\t\t\t";
				if ($esrow['datestamp'] != "Y") {$editsurvey .= " ".$clang->gT("Responses will not be date stamped.");}
				else {$editsurvey .= $clang->gT("Responses will be date stamped.");}
				$editsurvey .= "<font size='1' color='red'>&nbsp;(".$clang->gT("Cannot be changed").")\n"
				. "\t\t</font>\n";
				$editsurvey .= "<input type='hidden' name='datestamp' value=\"{$esrow['datestamp']}\" /></td>\n";
			}
			else
			{
				$editsurvey .= "\t\t<td align='left'><select name='datestamp'>\n"
				. "\t\t\t<option value='Y'";
				if ($esrow['datestamp'] == "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
				. "\t\t\t<option value='N'";
				if ($esrow['datestamp'] != "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("No")."</option>\n"
				. "</select>\n\t\t</td>\n";
			}
			$editsurvey .= "</tr>\n";

			$editsurvey .= "\t<tr><td align='right'>".$clang->gT("Save IP Address?")."</td>\n";

			if ($esrow['active'] == "Y")
			{
				$editsurvey .= "\t\t<td align='left'>\n\t\t\t";
				if ($esrow['ipaddr'] != "Y") {$editsurvey .= " ".$clang->gT("Responses will not have the IP address logged.");}
				else {$editsurvey .= $clang->gT("Responses will have the IP address logged");}
				$editsurvey .= "<font size='1' color='red'>&nbsp;(".$clang->gT("Cannot be changed").")\n"
				. "\t\t</font>\n";
				$editsurvey .= "<input type='hidden' name='ipaddr' value='".$esrow['ipaddr']."' />\n</td>";
			}
			else
			{
				$editsurvey .= "\t\t<td align='left'><select name='ipaddr'>\n"
				. "\t\t\t<option value='Y'";
				if ($esrow['ipaddr'] == "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
				. "\t\t\t<option value='N'";
				if ($esrow['ipaddr'] != "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("No")."</option>\n"
				. "</select>\n\t\t</td>\n";
			}

			// begin REF URL Block
			$editsurvey .= "\t</tr><tr><td align='right'>".$clang->gT("Save Referring URL?")."</td>\n";

			if ($esrow['active'] == "Y")
			{
				$editsurvey .= "\t\t<td align='left'>\n\t\t\t";
				if ($esrow['refurl'] != "Y") {$editsurvey .= " ".$clang->gT("Responses will not have their referring URL logged.");}
				else {$editsurvey .= $clang->gT("Responses will have their referring URL logged.");}
				$editsurvey .= "<font size='1' color='red'>&nbsp;(".$clang->gT("Cannot be changed").")\n"
				. "\t\t</font>\n";
				$editsurvey .= "<input type='hidden' name='refurl' value='".$esrow['refurl']."' />\n</td>";
			}
			else
			{
				$editsurvey .= "\t\t<td align='left'><select name='refurl'>\n"
				. "\t\t\t<option value='Y'";
				if ($esrow['refurl'] == "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
				. "\t\t\t<option value='N'";
				if ($esrow['refurl'] != "Y") {$editsurvey .= " selected='selected'";}
				$editsurvey .= ">".$clang->gT("No")."</option>\n"
				. "</select>\n\t\t</td>\n";
			}
			// BENBUN - END REF URL Block

			// Base Language
			$editsurvey .= "\t</tr><tr><td align='right'>".$clang->gT("Base Language:")."</td>\n"
			. "\t\t<td align='left'>\n".GetLanguageNameFromCode($esrow['language'])
			. "\t\t</td>\t</tr>\n"

			// Additional languages listbox
			. "\t<tr><td align='right'>".$clang->gT("Additional Languages").":</td>\n"
			. "\t\t<td align='left'><select multiple='multiple' style='min-width:250px;'  size='5' id='additional_languages' name='additional_languages'>";
			$jsX=0;
			$jsRemLang ="<script type=\"text/javascript\">\nvar mylangs = new Array() \n";
>>>>>>> refs/heads/limesurvey16

    }
    else
    {
        include("access_denied.php");
    }
}

<<<<<<< HEAD
elseif ($action == "surveyrights")
{
    $addsummary = "<div class='header ui-widget-header'>".$clang->gT("Edit survey permissions")."</div>\n";
    $addsummary .= "<div class='messagebox ui-corner-all'>\n";
=======
			// Available languages listbox
			. "\t\t<td align='left'><select size='5' id='available_languages' name='available_languages'>";
			$tempLang=GetAdditionalLanguagesFromSurveyID($surveyid);
			foreach (getLanguageData() as  $langkey2=>$langname)
			{
				if ($langkey2!=$esrow['language'] && in_array($langkey2,$tempLang)==false)  // base languag must not be shown here
				{
					$editsurvey .= "\t\t\t<option id='".$langkey2."' value='".$langkey2."'";
					$editsurvey .= ">".$langname['description']." - ".$langname['nativedescription']."</option>\n";
				}
			}
			$editsurvey .= "</select></td>"
			. " </tr>\n"
			. "\t<tr><td align='right'>".$clang->gT("Expires?")."</td>\n"
			. "\t\t\t<td align='left'><select name='useexpiry'><option value='Y'";
			if (isset($esrow['useexpiry']) && $esrow['useexpiry'] == "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Yes")."</option>\n"
			. "\t\t\t<option value='N'";
			if (!isset($esrow['useexpiry']) || $esrow['useexpiry'] != "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("No")."</option></select></td></tr><tr><td align='right'>".$clang->gT("Expiry Date:")."</td>\n"
			. "\t\t<td align='left'><input type='text' id='f_date_b' size='12' name='expires' value=\"{$esrow['expires']}\" /><button type='reset' id='f_trigger_b'>...</button></td></tr>\n"
			. "\t<tr><td align='right'>".$clang->gT("End URL:")."</td>\n"
			. "\t\t<td align='left'><input type='text' size='50' name='url' value=\"{$esrow['url']}\" /></td></tr>\n"
			. "\t<tr><td align='right'>".$clang->gT("Automatically load URL when survey complete?")."</td>\n"
			. "\t\t<td align='left'><select name='autoredirect'>";
			$editsurvey .= "\t\t\t<option value='Y'";
			if (isset($esrow['autoredirect']) && $esrow['autoredirect'] == "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("Yes")."</option>\n";
			$editsurvey .= "\t\t\t<option value='N'";
			if (!isset($esrow['autoredirect']) || $esrow['autoredirect'] != "Y") {$editsurvey .= " selected='selected'";}
			$editsurvey .= ">".$clang->gT("No")."</option>\n"
			. "</select></td></tr>";
>>>>>>> refs/heads/limesurvey16

    if(isset($postuserid)){
        $query = "SELECT sid, owner_id FROM ".db_table_name('surveys')." WHERE sid = {$surveyid}";
        if ($_SESSION['USER_RIGHT_SUPERADMIN'] != 1)
        {
            $query.=" AND owner_id != {$postuserid} AND owner_id = ".$_SESSION['loginID'];
        }
    }
    else{
        $sQuery = "SELECT owner_id FROM ".db_table_name('surveys')." WHERE sid = {$surveyid}";
        if ($_SESSION['USER_RIGHT_SUPERADMIN'] != 1)
        {
            $query.=" AND owner_id = ".$_SESSION['loginID'];
        }
        $iOwnerID=$connect->GetOne($sQuery);
    }

    $aBaseSurveyPermissions=aGetBaseSurveyPermissions();
    $aPermissions=array();
    foreach ($aBaseSurveyPermissions as $sPermissionKey=>$aCRUDPermissions)
    {
        foreach ($aCRUDPermissions as $sCRUDKey=>$CRUDValue)
        {
            if (!in_array($sCRUDKey,array('create','read','update','delete','import','export'))) continue;

            if ($CRUDValue)
            {
                if(isset($_POST["perm_{$sPermissionKey}_{$sCRUDKey}"])){
                    $aPermissions[$sPermissionKey][$sCRUDKey]=1;
                }
                else
                {
                    $aPermissions[$sPermissionKey][$sCRUDKey]=0;
                }
            }
        }
    }
    if (isset($postusergroupid) && $postusergroupid>0)
    {
        $sQuery = "SELECT uid from ".db_table_name('user_in_groups')." where ugid = {$postusergroupid} and uid<>{$_SESSION['loginID']} AND uid<>{$iOwnerID}";
        $oResult = db_execute_assoc($sQuery); //Checked
        if($oResult->RecordCount() > 0)
        {
            while ($aRow = $oResult->FetchRow())
            {
                SetSurveyPermissions($aRow['uid'], $surveyid, $aPermissions);
            }
            $addsummary .= "<div class=\"successheader\">".$clang->gT("Survey permissions for all users in this group were successfully updated.")."</div>\n";
        }
    }
    else
    {
        if(SetSurveyPermissions($postuserid, $surveyid, $aPermissions))
        {
            $addsummary .= "<div class=\"successheader\">".$clang->gT("Survey permissions were successfully updated.")."</div>\n";
        }
        else
        {
            $addsummary .= "<div class=\"warningheader\">".$clang->gT("Failed to update survey permissions!")."</div>\n";
        }

    }
    $addsummary .= "<br/><input type=\"submit\" onclick=\"window.open('$scriptname?sid={$surveyid}&amp;action=surveysecurity', '_top')\" value=\"".$clang->gT("Continue")."\"/>\n";
    $addsummary .= "</div>\n";
}

// *************************************************
// Survey Rights End	****************************
// *************************************************

// Edit survey general settings

<<<<<<< HEAD
if ($action == "editsurveysettings" || $action == "newsurvey")
{
  include("editsurveysettings.php");
}
=======
	
		$editsurvey ="<script type='text/javascript'>\n"
		. "<!--\n"
		. "function fillin(tofield, fromfield)\n"
		. "\t{\n"
		. "\t\tif (confirm(\"".$clang->gT("This will replace the existing text. Continue?","js")."\")) {\n"
		. "\t\t\tdocument.getElementById(tofield).value = document.getElementById(fromfield).value\n"
		. "\t\t}\n"
		. "\t}\n"
		. "--></script>\n"
        . "<table width='100%' border='0'>\n\t<tr><td class='settingcaption'>"
		. "\t\t".$clang->gT("Edit Survey - Step 2 of 2")."</td></tr></table>\n"
		. '<div class="tab-pane" id="tab-pane-1">';
		foreach ($grplangs as $grouplang)
		{
            // this one is created to get the right default texts fo each language
            $bplang = new limesurvey_lang($grouplang);		
    		$esquery = "SELECT * FROM ".db_table_name("surveys_languagesettings")." WHERE surveyls_survey_id=$surveyid and surveyls_language='$grouplang'";
    		$esresult = db_execute_assoc($esquery);
    		$esrow = $esresult->FetchRow();
			$editsurvey .= '<div class="tab-page"> <h2 class="tab">'.getLanguageNameFromCode($esrow['surveyls_language'],false);
			if ($esrow['surveyls_language']==GetBaseLanguageFromSurveyID($surveyid)) {$editsurvey .= '('.$clang->gT("Base Language").')';}
			$editsurvey .= '</h2>';
			$esrow = array_map('htmlspecialchars', $esrow);
			$editsurvey .= "<form name='addnewsurvey' action='$scriptname' method='post'>\n";
>>>>>>> refs/heads/limesurvey16




// Edit survey text elements

if ($action == "updatesurveysettingsandeditlocalesettings" || $action == "editsurveylocalesettings")  // Edit survey step 2  - editing language dependent settings
{
  include("editsurveytextelements.php");
}

if ($action == "translate")  // Translate survey
{
    if(bHasSurveyPermission($surveyid,'translation','read'))
    {
        $translateoutput .="<div class='header ui-widget-header'>".$clang->gT("Quick-translate survey")."</div>\n";
    }
    else
    {
        include("access_denied.php");
    }

}

if ($action == "emailtemplates")
{
  include("editemailtemplates.php");
}




if($action == "quotas")
        {
    include("quota.php");
        }

function replacenewline ($texttoreplace)
{
    $texttoreplace = str_replace( "\n", '<br />', $texttoreplace);
    //  $texttoreplace = htmlentities( $texttoreplace, ENT_QUOTES, UTF-8);
    $new_str = '';

    for($i = 0; $i < strlen($texttoreplace); $i++) {
        $new_str .= '\x' . dechex(ord(substr($texttoreplace, $i, 1)));
    }

    return $new_str;
}

/**
 * showadminmenu() function returns html text for the administration button bar
 *
 * @global string $homedir
 * @global string $scriptname
 * @global string $surveyid
 * @global string $setfont
 * @global string $imageurl
 * @return string $adminmenu
 */
function showadminmenu()
{
    global $homedir, $scriptname, $surveyid, $setfont, $imageurl, $clang, $debug, $action, $updateavailable, $updatebuild, $updateversion, $updatelastcheck, $databasetype;

    $adminmenu  = "<div class='menubar'>\n";
    if  ($_SESSION['pw_notify'] && $debug<2)  {
						$_SESSION['flashmessage']=$clang->gT("Warning: You are still using the default password ('password'). Please change your password and re-login again.");
	}
    $adminmenu  .="<div class='menubar-title ui-widget-header'>\n"
    . "<div class='menubar-title-left'>\n"
    . "<strong>".$clang->gT("Administration")."</strong>";
    if(isset($_SESSION['loginID']))
    {
        $adminmenu  .= " --  ".$clang->gT("Logged in as:"). " <strong>"
        . "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=personalsettings', '_top')\" title=\"".$clang->gTview("Edit your personal preferences")."\" >"
        . $_SESSION['user']." <img src='{$imageurl}/profile_edit.png' name='ProfileEdit' alt='".$clang->gT("Edit your personal preferences")."' /></a>"
        . "</strong>\n";
    }
    $adminmenu  .="</div>\n";
    if($_SESSION['USER_RIGHT_SUPERADMIN'] == 1 && isset($updatelastcheck) && $updatelastcheck>0 && isset($updateavailable) && $updateavailable==1)
    {
        $adminmenu  .="<div class='menubar-title-right'><a href='{$scriptname}?action=globalsettings'>".sprintf($clang->gT('Update available: %s'),$updateversion."($updatebuild)").'</a></div>';
    }
    $adminmenu .= "</div>\n"
    . "<div class='menubar-main'>\n"
    . "<div class='menubar-left'>\n"
    . "<a href=\"#\" onclick=\"window.open('{$scriptname}', '_top')\" title=\"".$clang->gTview("Default Administration Page")."\">"
    . "<img src='{$imageurl}/home.png' name='HomeButton' alt='".$clang->gT("Default Administration Page")."' /></a>\n";

<<<<<<< HEAD
    $adminmenu .= "<img src='{$imageurl}/blank.gif' alt='' width='11' />\n"
    . "<img src='{$imageurl}/seperator.gif' alt='' />\n";
=======
if ($action == "newsurvey")
{
	if($_SESSION['USER_RIGHT_CREATE_SURVEY'])
	{
		$newsurvey  = "<form name='addnewsurvey' action='$scriptname' method='post' onsubmit=\"return isEmpty(document.getElementById('surveyls_title'), '".$clang->gT("Error: You have to enter a title for this survey.",'js')."');\" >\n"
<<<<<<< HEAD
        . "<table width='100%' border='0' class='form2columns'>\n\t<thead><tr><th colspan='2'>\n"
		. "\t\t".$clang->gT("Create Survey")."</th></tr></thead>\n"
		. "\t<tr>\n"
		. "\t\t<td width='25%'>".$clang->gT("Title").":</td>\n"
		. "\t\t<td><input type='text' size='82' maxlength='200' id='surveyls_title' name='surveyls_title' /><font size='1'> ".$clang->gT("(This field is mandatory.)")."</font></td></tr>\n"
		. "\t<tr><td>".$clang->gT("Description:")."</td>\n"
		. "\t\t<td><textarea cols='80' rows='10' name='description'></textarea></td></tr>\n"
		. "\t<tr><td>".$clang->gT("Welcome:")."</td>\n"
		. "\t\t<td><textarea cols='80' rows='10' name='welcome'></textarea></td></tr>\n"
		. "\t<tr><td>".$clang->gT("Administrator:")."</td>\n"
		. "\t\t<td><input type='text' size='50' name='admin' /></td></tr>\n"
		. "\t<tr><td>".$clang->gT("Admin Email:")."</td>\n"
		. "\t\t<td><input type='text' size='50' name='adminemail' /></td></tr>\n";
		$newsurvey .= "\t<tr><td>".$clang->gT("Fax To:")."</td>\n"
		. "\t\t<td><input type='text' size='50' name='faxto' /></td></tr>\n";
		$newsurvey .= "\t<tr><td>".$clang->gT("Format:")."</td>\n"
		. "\t\t<td><select name='format'>\n"
=======
        . "<table width='100%' border='0'>\n\t<tr><td colspan='2' class='settingcaption'>\n"
		. "\t\t".$clang->gT("Create Survey")."</td></tr>\n"
		. "\t<tr>\n"
		. "\t\t<td align='right' width='25%'>".$clang->gT("Title").":</td>\n"
		. "\t\t<td align='left'><input type='text' size='50' id='surveyls_title' name='surveyls_title' /><font size=1> ".$clang->gT("(This field is mandatory.)")."</font></td></tr>\n"
		. "\t<tr><td align='right'>".$clang->gT("Description:")."</td>\n"
		. "\t\t<td align='left'><textarea cols='50' rows='5' name='description'></textarea></td></tr>\n"
		. "\t<tr><td align='right'>".$clang->gT("Welcome:")."</td>\n"
		. "\t\t<td align='left'><textarea cols='50' rows='5' name='welcome'></textarea></td></tr>\n"
		. "\t<tr><td align='right'>".$clang->gT("Administrator:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='50' name='admin' /></td></tr>\n"
		. "\t<tr><td align='right'>".$clang->gT("Admin Email:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='50' name='adminemail' /></td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Fax To:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='50' name='faxto' /></td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Format:")."</td>\n"
		. "\t\t<td align='left'><select name='format'>\n"
>>>>>>> refs/heads/limesurvey16
		. "\t\t\t<option value='S' selected='selected'>".$clang->gT("Question by Question")."</option>\n"
		. "\t\t\t<option value='G'>".$clang->gT("Group by Group")."</option>\n"
		. "\t\t\t<option value='A'>".$clang->gT("All in one")."</option>\n"
		. "\t\t</select></td>\n"
		. "\t</tr>\n";
<<<<<<< HEAD
		$newsurvey .= "\t<tr><td>".$clang->gT("Template:")."</td>\n"
		. "\t\t<td><select name='template'>\n";
=======
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Template:")."</td>\n"
		. "\t\t<td align='left'><select name='template'>\n";
>>>>>>> refs/heads/limesurvey16
		foreach (gettemplatelist() as $tname)
		{
			$newsurvey .= "\t\t\t<option value='$tname'";
			if (isset($esrow) && $esrow['template'] && $tname == $esrow['template']) {$newsurvey .= " selected='selected'";}
			elseif ((!isset($esrow) || !$esrow['template']) && $tname == "default") {$newsurvey .= " selected='selected'";}
			$newsurvey .= ">$tname</option>\n";
		}
		$newsurvey .= "\t\t</select></td>\n"
		. "\t</tr>\n";
		//COOKIES
<<<<<<< HEAD
		$newsurvey .= "\t<tr><td>".$clang->gT("Use Cookies?")."</td>\n"
		. "\t\t<td><select name='usecookie'>\n"
=======
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Use Cookies?")."</td>\n"
		. "\t\t<td align='left'><select name='usecookie'>\n"
>>>>>>> refs/heads/limesurvey16
		. "\t\t\t<option value='Y'";
		if (isset($esrow) && $esrow['usecookie'] == "Y") {$newsurvey .= " selected='selected'";}
		$newsurvey .= ">".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N'";
		if (isset($esrow) && $esrow['usecookie'] != "Y" || !isset($esrow)) {$newsurvey .= " selected='selected'";}
		$newsurvey .= ">".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n"
		. "\t</tr>\n";
		//ALLOW SAVES
<<<<<<< HEAD
		$newsurvey .= "\t<tr><td>".$clang->gT("Allow Saves?")."</td>\n"
		. "\t\t<td><select name='allowsave'>\n"
=======
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Allow Saves?")."</td>\n"
		. "\t\t<td align='left'><select name='allowsave'>\n"
>>>>>>> refs/heads/limesurvey16
		. "\t\t\t<option value='Y'";
		if (!isset($esrow['allowsave']) || !$esrow['allowsave'] || $esrow['allowsave'] == "Y") {$newsurvey .= " selected='selected'";}
		$newsurvey .= ">".$clang->gT("Yes")."</option>\n"
		. "\t\t<option value='N'";
		if (isset($esrow['allowsave']) && $esrow['allowsave'] == "N") {$newsurvey .= " selected='selected'";}
		$newsurvey .= ">".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n"
		. "\t</tr>\n";
		//ALLOW PREV
<<<<<<< HEAD
		$newsurvey .= "\t<tr><td>".$clang->gT("Show [<< Prev] button")."</td>\n"
		. "\t\t<td><select name='allowprev'>\n"
=======
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Show [<< Prev] button")."</td>\n"
		. "\t\t<td align='left'><select name='allowprev'>\n"
>>>>>>> refs/heads/limesurvey16
		. "\t\t\t<option value='Y'";
		if (!isset($esrow['allowprev']) || !$esrow['allowprev'] || $esrow['allowprev'] == "Y") {$newsurvey .= " selected='selected'";}
		$newsurvey .= ">".$clang->gT("Yes")."</option>\n"
		. "\t\t<option value='N'";
		if (isset($esrow['allowprev']) && $esrow['allowprev'] == "N") {$newsurvey .= " selected='selected'";}
		$newsurvey .= ">".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n"
		. "\t</tr>\n";
		//NOTIFICATIONS
<<<<<<< HEAD
		$newsurvey .= "\t<tr><td>".$clang->gT("Admin Notification:")."</td>\n"
		. "\t\t<td><select name='notification'>\n"
		. getNotificationlist(0)
		. "\t\t</select></td>\n"
		. "\t</tr>\n";
		// ANONYMOUS
		$newsurvey .= "\t<tr><td>".$clang->gT("Anonymous answers?")."\n";
		  // warning message if anonymous + datestamped anwsers
		$newsurvey .= "\n"
		. "\t<script type=\"text/javascript\"><!-- \n"
		. "\tfunction alertPrivacy()\n"
		. "\t{"
		. "\t\tif (document.getElementById('private').value == 'Y')\n"
		. "\t\t{\n"
		. "\t\t\talert('".$clang->gT("Warning").": ".$clang->gT("If you turn on the -Anonymous answers- option and create a tokens table, LimeSurvey will mark your completed tokens only with a 'Y' instead of date/time to ensure the anonymity of your participants.","js")."');\n"
		. "\t\t}\n"
		. "\t}"
		. "\t//--></script></td>\n";
>>>>>>> refs/heads/stable_plus
=======
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Admin Notification:")."</td>\n"
		. "\t\t<td align='left'><select name='notification'>\n"
		. getNotificationlist(0)
		. "\t\t</select></td>\n"
		. "\t</tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Anonymous?")."</td>\n"
		. "\t\t<td align='left'><select name='private'>\n"
		. "\t\t\t<option value='Y' selected='selected'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N'>".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n\t</tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Invitation Email Subject:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='54' name='email_invite_subj' value='".$clang->gT("Invitation to participate in survey")."' />\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Invitation Email:")."</td>\n"
		. "\t\t<td align='left'><textarea cols=50 rows=5 name='email_invite'>".$clang->gT("Dear {FIRSTNAME},\n\nYou have been invited to participate in a survey.\n\nThe survey is titled:\n\"{SURVEYNAME}\"\n\n\"{SURVEYDESCRIPTION}\"\n\nTo participate, please click on the link below.\n\nSincerely,\n\n{ADMINNAME} ({ADMINEMAIL})\n\n----------------------------------------------\nClick here to do the survey:\n{SURVEYURL}")."</textarea>\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Email Reminder Subject:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='54' name='email_remind_subj' value='".$clang->gT("Reminder to participate in survey")."' />\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Email Reminder:")."</td>\n"
		. "\t\t<td align='left'><textarea cols=50 rows=5 name='email_remind'>".$clang->gT("Dear {FIRSTNAME},\n\nRecently we invited you to participate in a survey.\n\nWe note that you have not yet completed the survey, and wish to remind you that the survey is still available should you wish to take part.\n\nThe survey is titled:\n\"{SURVEYNAME}\"\n\n\"{SURVEYDESCRIPTION}\"\n\nTo participate, please click on the link below.\n\nSincerely,\n\n{ADMINNAME} ({ADMINEMAIL})\n\n----------------------------------------------\nClick here to do the survey:\n{SURVEYURL}")."</textarea>\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Confirmation Email Subject")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='54' name='email_confirm_subj' value='".$clang->gT("Confirmation of completed survey")."' />\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Confirmation Email")."</td>\n"
		. "\t\t<td align='left'><textarea cols=50 rows=5 name='email_confirm'>".$clang->gT("Dear {FIRSTNAME},\n\nThis email is to confirm that you have completed the survey titled {SURVEYNAME} and your response has been saved. Thank you for participating.\n\nIf you have any further questions about this email, please contact {ADMINNAME} on {ADMINEMAIL}.\n\nSincerely,\n\n{ADMINNAME}")."</textarea>\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Allow public registration?")."</td>\n"
		. "\t\t<td align='left'><select name='allowregister'>\n"
		. "\t\t\t<option value='Y'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N' selected='selected'>".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n\t</tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Public registration Email Subject:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='54' name='email_register_subj' value='".$clang->gT("Survey Registration Confirmation")."' />\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Public registration Email:")."</td>\n"
		. "\t\t<td align='left'><textarea cols=50 rows=5 name='email_register'>".$clang->gT("Dear {FIRSTNAME},\n\nYou, or someone using your email address, have registered to participate in an online survey titled {SURVEYNAME}.\n\nTo complete this survey, click on the following URL:\n\n{SURVEYURL}\n\nIf you have any questions about this survey, or if you did not register to participate and believe this email is in error, please contact {ADMINNAME} at {ADMINEMAIL}.")."</textarea>\n"
		. "\t</td></tr>\n";
		$newsurvey .= "\t<tr><td align='right' valign='top'>".$clang->gT("Token Attribute Names:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='25' name='attribute1' />(".$clang->gT("Attribute 1").")<br />"
		. "<input type='text' size='25' name='attribute2' />(".$clang->gT("Attribute 2").")</td>\n\t</tr>\n";
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Date Stamp?")."</td>\n"
		. "\t\t<td align='left'><select name='datestamp'>\n"
		. "\t\t\t<option value='Y'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N' selected='selected'>".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n\t</tr>\n";
		// IP Address
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Save IP Address?")."</td>\n"
		. "\t\t<td align='left'><select name='ipaddr'>\n"                                . "\t\t\t<option value='Y'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N' selected='selected'>".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n\t</tr>\n";
		// Referring URL
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Save Referring URL?")."</td>\n"
		. "\t\t<td align='left'><select name='refurl'>\n"                                . "\t\t\t<option value='Y'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N' selected='selected'>".$clang->gT("No")."</option>\n"
		. "\t\t</select></td>\n\t</tr>\n";
		//Survey Language
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Base Language:")."</td>\n"
		. "\t\t<td align='left'><select name='language'>\n";
>>>>>>> refs/heads/limesurvey16

    // Edit users
    $adminmenu .="<a href=\"#\" onclick=\"window.open('{$scriptname}?action=editusers', '_top')\" title=\"".$clang->gTview("Create/Edit Users")."\" >"
    ."<img src='{$imageurl}/security.png' name='AdminSecurity' alt='".$clang->gT("Create/Edit Users")."' /></a>";

    $adminmenu .="<a href=\"#\" onclick=\"window.open('{$scriptname}?action=editusergroups', '_top')\" title=\"".$clang->gTview("Create/Edit Groups")."\" >"
    ."<img src='{$imageurl}/usergroup.png' alt='".$clang->gT("Create/Edit Groups")."' /></a>\n" ;

    if($_SESSION['USER_RIGHT_SUPERADMIN'] == 1)
    {
        $adminmenu .= "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=globalsettings', '_top')\" title=\"".$clang->gTview("Global settings")."\" >"
        . "<img src='{$imageurl}/global.png' name='GlobalSettings' alt='". $clang->gT("Global settings")."' /></a>"
        . "<img src='{$imageurl}/seperator.gif' alt='' border='0' hspace='0' />\n";
    }
    // Check data integrity
    if($_SESSION['USER_RIGHT_CONFIGURATOR'] == 1)
    {
        $adminmenu .= "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=checkintegrity', '_top')\" title=\"".$clang->gTview("Check Data Integrity")."\">".
                      "<img src='{$imageurl}/checkdb.png' name='CheckDataIntegrity' width='40' height='40' alt='".$clang->gT("Check Data Integrity")."' /></a>\n";
    }

<<<<<<< HEAD
    // list surveys
    $adminmenu .= "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=listsurveys', '_top')\" title=\"".$clang->gTview("List Surveys")."\" >\n"
    ."<img src='$imageurl/surveylist.png' name='ListSurveys' alt='".$clang->gT("List Surveys")."' />"
    ."</a>" ;
=======
		$newsurvey .= "\t\t</select><font size='1'> ".$clang->gT("This setting cannot be changed later!")."</font></td>\n"
		. "\t</tr>\n";
<<<<<<< HEAD
		$newsurvey .= "\t<tr><td>".$clang->gT("Expires?")."</td>\n"
		. "\t\t\t<td align='left'><select name='useexpiry'><option value='Y'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N' selected='selected'>".$clang->gT("No")."</option></select></td></tr>\n"
		. "<tr><td>".$clang->gT("Expiry Date:")."</td>\n"
=======
		$newsurvey .= "\t<tr><td align='right'>".$clang->gT("Expires?")."</td>\n"
		. "\t\t\t<td align='left'><select name='useexpiry'><option value='Y'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N' selected='selected'>".$clang->gT("No")."</option></select></td></tr>\n"
		. "<tr><td align='right'>".$clang->gT("Expiry Date:")."</td>\n"
>>>>>>> refs/heads/limesurvey16
		. "\t\t<td align='left'><input type='text' id='f_date_b' size='12' name='expires' value='"
		. date_shift(date("Y-m-d H:i:s"), "Y-m-d", $timeadjust)."' /><button type='reset' id='f_trigger_b'>...</button>"
		. "<font size='1'> ".$clang->gT("Date Format").": YYYY-MM-DD</font></td></tr>\n"
<<<<<<< HEAD
		. "\t<tr><td>".$clang->gT("End URL:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='50' name='url' value='http://";
		if (isset($esrow)) {$newsurvey .= $esrow['url'];}
		$newsurvey .= "' /></td></tr>\n"
		. "\t<tr><td>".$clang->gT("URL Description:")."</td>\n"
		. "\t\t<td align='left'><input type='text' maxlength='255' size='50' name='urldescrip' value='";
		if (isset($esrow)) {$newsurvey .= $esrow['surveyls_urldescription'];}
		$newsurvey .= "' /></td></tr>\n"
		. "\t<tr><td>".$clang->gT("Automatically load URL when survey complete?")."</td>\n"
=======
		. "\t<tr><td align='right'>".$clang->gT("End URL:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='50' name='url' value='http://";
		if (isset($esrow)) {$newsurvey .= $esrow['url'];}
		$newsurvey .= "' /></td></tr>\n"
		. "\t<tr><td align='right'>".$clang->gT("URL Description:")."</td>\n"
		. "\t\t<td align='left'><input type='text' size='50' name='urldescrip' value='";
		if (isset($esrow)) {$newsurvey .= $esrow['surveyls_urldescription'];}
		$newsurvey .= "' /></td></tr>\n"
		. "\t<tr><td align='right'>".$clang->gT("Automatically load URL when survey complete?")."</td>\n"
>>>>>>> refs/heads/limesurvey16
		. "\t\t<td align='left'><select name='autoredirect'>\n"
		. "\t\t\t<option value='Y'>".$clang->gT("Yes")."</option>\n"
		. "\t\t\t<option value='N' selected='selected'>".$clang->gT("No")."</option>\n"
		. "</select></td></tr>"
		. "\t<tr><td colspan='2' class='centered'><input type='submit' value='".$clang->gT("Create Survey")."' />\n"
		. "\t<input type='hidden' name='action' value='insertnewsurvey' /></td>\n"
		. "\t</tr>\n"
		. "</table></form>\n";
		$newsurvey .= "<center>".$clang->gT("OR")."</center>\n";
		$newsurvey .= "<form enctype='multipart/form-data' name='importsurvey' action='$scriptname' method='post' onsubmit='return validatefilename(this,\"".$clang->gT('Please select a file to import!','js')."\");'>\n"
<<<<<<< HEAD
		. "<table width='100%' border='0' class='form2columns'>\n"
		. "<tr><th colspan='2'>\n"
		. "\t\t".$clang->gT("Import Survey")."</th></tr>\n\t<tr>"
		. "\t\t<td>".$clang->gT("Select CSV/SQL File:")."</td>\n"
		. "\t\t<td><input name=\"the_file\" type=\"file\" size=\"50\" /></td></tr>\n"
		. "\t<tr><td colspan='2' class='centered'><input type='submit' value='".$clang->gT("Import Survey")."' />\n"
=======
		. "<table width='100%' border='0'>\n"
		. "<tr><td colspan='2' class='settingcaption'>\n"
		. "\t\t".$clang->gT("Import Survey")."</td></tr>\n\t<tr>"
		. "\t\t<td align='right'>".$clang->gT("Select CSV/SQL File:")."</td>\n"
		. "\t\t<td align='left'><input name=\"the_file\" type=\"file\" size=\"35\" /></td></tr>\n"
		. "\t<tr><td colspan='2' align='center'><input type='submit' value='".$clang->gT("Import Survey")."' />\n"
>>>>>>> refs/heads/limesurvey16
		. "\t<input type='hidden' name='action' value='importsurvey' /></td>\n"
		. "\t</tr>\n</table></form>\n";
        
		// Here we do setup the date javascript
		$newsurvey .= "<script type=\"text/javascript\">\n"
		. "Calendar.setup({\n"
		. "inputField     :    \"f_date_b\",\n"    // id of the input field
		. "ifFormat       :    \"%Y-%m-%d\",\n"   // format of the input field
		. "showsTime      :    false,\n"                    // will display a time selector
		. "button         :    \"f_trigger_b\",\n"         // trigger for the calendar (button ID)
		. "singleClick    :    true,\n"                   // double-click mode
		. "step           :    1\n"                        // show all years in drop-down boxes (instead of every other year as default)
		. "});\n"
		. "</script>\n";
	}
	else
	{
		include("access_denied.php");
	}
}
>>>>>>> refs/heads/stable_plus

    // db backup & label editor
    if($_SESSION['USER_RIGHT_CONFIGURATOR'] == 1)
    {
        if ($databasetype=='mysql' || $databasetype=='mysqli')
        {
            $adminmenu  .= "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=dumpdb', '_top')\" title=\"".$clang->gTview("Backup Entire Database")."\">\n"
            ."<img src='{$imageurl}/backup.png' name='ExportDB' alt='". $clang->gT("Backup Entire Database")."' />"
            ."</a>\n";
        }
        else
        {
            $adminmenu  .= "<img src='{$imageurl}/backup_disabled.png' name='ExportDB' alt='". $clang->gT("The database export is only available for MySQL databases. For other database types please use the according backup mechanism to create a database dump.")."' />";
        }
        $adminmenu.="<img src='{$imageurl}/seperator.gif' alt=''  border='0' hspace='0' />\n";
    }

    if($_SESSION['USER_RIGHT_MANAGE_LABEL'] == 1)
    {
        $adminmenu  .= "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=labels', '_top')\" title=\"".$clang->gTview("Edit label sets")."\">\n"
        ."<img src='{$imageurl}/labels.png'  name='LabelsEditor' alt='". $clang->gT("Edit label sets")."' /></a>\n"
        ."<img src='{$imageurl}/seperator.gif' alt=''  border='0' hspace='0' />\n";
    }

    if($_SESSION['USER_RIGHT_MANAGE_TEMPLATE'] == 1)
    {
        $adminmenu .= "<a href='{$scriptname}?action=templates' title=\"".$clang->gTview("Template Editor")."\" >"
        ."<img src='{$imageurl}/templates.png' name='EditTemplates' title='' alt='". $clang->gT("Template Editor")."' /></a>\n";
    }

    // survey select box
    $adminmenu .= "</div><div class='menubar-right'><span class=\"boxcaption\">".$clang->gT("Surveys").":</span>"
    . "<select onchange=\"window.open(this.options[this.selectedIndex].value,'_top')\">\n"
    . getsurveylist()
    . "</select>\n";

<<<<<<< HEAD
    if($_SESSION['USER_RIGHT_CREATE_SURVEY'] == 1)
    {
        $adminmenu .= "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=newsurvey', '_top')\""
        ."title=\"".$clang->gTview("Create, import, or copy a survey")."\" >"
        ."<img src='{$imageurl}/add.png' name='AddSurvey' title='' alt='". $clang->gT("Create, import, or copy a survey")."' /></a>\n";
    }
=======
function questionjavascript($type, $qattributes)
{
	$newquestionoutput = "<script type='text/javascript'>\n"
    ."if (navigator.userAgent.indexOf(\"Gecko\") != -1)\n"
	."window.addEventListener(\"load\", init_gecko_select_hack, false);\n";	
	$jc=0;
	$newquestionoutput .= "\t\t\tvar qtypes = new Array();\n";
	$newquestionoutput .= "\t\t\tvar qnames = new Array();\n\n";
	foreach ($qattributes as $key=>$val)
	{
		foreach ($val as $vl)
		{
			$newquestionoutput .= "\t\t\tqtypes[$jc]='".$key."';\n";
			$newquestionoutput .= "\t\t\tqnames[$jc]='".$vl['name']."';\n";
			$jc++;
		}
	}
	$newquestionoutput .= "\t\t\t function buildQTlist(type)
				{
				document.getElementById('QTattributes').style.display='none';
				for (var i=document.getElementById('QTlist').options.length-1; i>=0; i--)
					{
					document.getElementById('QTlist').options[i] = null;
					}
				for (var i=0;i<qtypes.length;i++)
					{
					if (qtypes[i] == type)
						{
						document.getElementById('QTattributes').style.display='';
						document.getElementById('QTlist').options[document.getElementById('QTlist').options.length] = new Option(qnames[i], qnames[i]);
						}
					}
				}";
	$newquestionoutput .="\nfunction OtherSelection(QuestionType)\n"
	. "\t{\n"
	. "if (QuestionType == '') {QuestionType=document.getElementById('question_type').value;}\n"
	. "\tif (QuestionType == 'M' || QuestionType == 'P' || QuestionType == 'L' || QuestionType == '!')\n"
	. "\t\t{\n"
	. "\t\tdocument.getElementById('OtherSelection').style.display = '';\n"
	. "\t\tdocument.getElementById('LabelSets').style.display = 'none';\n"
	. "\t\tdocument.getElementById('Validation').style.display = 'none';\n"
	. "\t\t}\n"
	. "\telse if (QuestionType == 'F' || QuestionType == 'H' || QuestionType == 'W' || QuestionType == 'Z')\n"
	. "\t\t{\n"
	. "\t\tdocument.getElementById('LabelSets').style.display = '';\n"
	. "\t\tdocument.getElementById('OtherSelection').style.display = 'none';\n"
	. "\t\tdocument.getElementById('Validation').style.display = 'none';\n"
	. "\t\t}\n"
	. "\telse if (QuestionType == 'S' || QuestionType == 'T' || QuestionType == 'U' || QuestionType == 'N' || QuestionType == 'D' || QuestionType=='')\n"
	. "\t\t{\n"
	. "\t\tdocument.getElementById('Validation').style.display = '';\n"
	. "\t\tdocument.getElementById('OtherSelection').style.display ='none';\n"
	. "\t\tdocument.getElementById('ON').checked = true;\n"
	. "\t\tdocument.getElementById('LabelSets').style.display='none';\n"
	. "\t\t}\n"
	. "\telse\n"
	. "\t\t{\n"
	. "\t\tdocument.getElementById('LabelSets').style.display = 'none';\n"
	. "\t\tdocument.getElementById('OtherSelection').style.display = 'none';\n"
	. "\t\tdocument.getElementById('ON').checked = true;\n"
	. "\t\tdocument.getElementById('Validation').style.display = 'none';\n"
	//. "\t\tdocument.addnewquestion.other[1].checked = true;\n"
	. "\t\t}\n"
	. "\tbuildQTlist(QuestionType);\n"
	. "\t}\n"
	. "\tOtherSelection('$type');\n"
	. "</script>\n";
>>>>>>> refs/heads/limesurvey16


    if(isset($_SESSION['loginID'])) //ADDED to prevent errors by reading db while not logged in.
    {
        // Logout
        $adminmenu .= "<img src='{$imageurl}/seperator.gif' alt='' border='0' hspace='0' />"
        . "<a href=\"#\" onclick=\"window.open('{$scriptname}?action=logout', '_top')\" title=\"".$clang->gTview("Logout")."\" >"
        . "<img src='{$imageurl}/logout.png' name='Logout' alt='".$clang->gT("Logout")."'/></a>";

        //Show help
        $adminmenu .= "<a href=\"http://docs.limesurvey.org\" target='_blank' title=\"".$clang->gTview("LimeSurvey online manual")."\" >"
        . "<img src='{$imageurl}/showhelp.png' name='ShowHelp' alt='". $clang->gT("LimeSurvey online manual")."'/></a>";

        $adminmenu .= "</div>"
        . "</div>\n"
        . "</div>\n";
        //  $adminmenu .= "<p style='margin:0;font-size:1px;line-height:1px;height:1px;'>&nbsp;</p>"; //CSS Firefox 2 transition fix
        if (!isset($action) && !isset($surveyid) && count(getsurveylist(true))==0)
        {
            $adminmenu.= '<div style="width:500px;margin:0 auto;">'
            .'<h2>'.sprintf($clang->gT("Welcome to %s!"),'LimeSurvey').'</h2>'
            .'<p>'.$clang->gT("Some piece-of-cake steps to create your very own first survey:").'<br/>'
            .'<ol>'
            .'<li>'.sprintf($clang->gT('Create a new survey clicking on the %s icon in the upper right.'),"<img src='$imageurl/add_20.png' name='ShowHelp' title='' alt='". $clang->gT("Add survey")."'/>").'</li>'
            .'<li>'.$clang->gT('Create a new question group inside your survey.').'</li>'
            .'<li>'.$clang->gT('Create one or more questions inside the new question group.').'</li>'
            .'<li>'.sprintf($clang->gT('Done. Test your survey using the %s icon.'),"<img src='$imageurl/do_20.png' name='ShowHelp' title='' alt='". $clang->gT("Test survey")."'/>").'</li>'
            .'</ol></p><br />&nbsp;</div>';
        }

    }
    return $adminmenu;
}

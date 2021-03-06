<?php
/**
 * forms/eye_mag/help.php
 *
 * Help File for Shorthand Entry Technique on the Eye Form
 *
 * @package   OpenEMR
 * @link      https://www.open-emr.org
 * @author    Ray Magauran <magauran@MedFetch.com>
 * @copyright Copyright (c) 2016 Raymond Magauran <magauran@MedFetch.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

/* TODO: Cleanup code */

require_once("../../globals.php");
require_once("$srcdir/lists.inc");
require_once("$srcdir/api.inc");

use OpenEMR\Core\Header;

$form_folder = "eye_mag";
$showit    = $_REQUEST['zone'];
if ($showit=='') {
    $showit="general";
}

if ($showit=='ext') {
    $showit="external";
}
?>
<html>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Eye Exam Help" />
    <meta name="author" content="openEMR: ophthalmology help" />
    <?php Header::setupHeader(['jquery-ui', 'jquery-ui-excite-bike']); ?>

    <link rel="stylesheet" href="<?php echo $GLOBALS['assets_static_relative'] ?>/purecss/pure-min.css" />
    <link rel="stylesheet" href="../../forms/<?php echo $form_folder; ?>/css/style.css" type="text/css" />

    <script>
     $(function() {
        $("[id^='accordion_']").accordion({
        heightStyle: "content",
        collapsible: true,
        header: "h3",
        active: 0
        });
    });
    $(function() {
        $("[name^='accordion_']").hide();
        $("#accordion_<?php echo attr($showit); ?>_group").show()
        $("#<?php echo attr($showit); ?>_button").css("color","var(--danger)");
        $("[id$='_button'],[id$='_button2']").on("click", function() {
            var zone = this.id.match(/(.*)_button/)[1];
            $("[id$='_button']").css("color","var(--black)");
            $("#"+zone+"_button").css("color","var(--danger)");
            $("[id$='_group']").hide();
            $("[id^='accordion_"+zone+"_group']").show();
            var showit = zone+'_0';

        });

        $("[id^='accordion_']").on("click", function() {
            var active_panel = $(this).accordion( "option", "active" );
            $("[id^='accordion_']").accordion({
                active: active_panel
            });
        })
    });
    </script>

    <style>
        body {
            font-family: "FontAwesome", "Arial", sans-serif;
         }
         .nodisplay {
            display: none;
         }
            table th {
                text-align: center;
                vertical-align: middle;
                margin: 20px;
                border: 1px solid var(--black);
                padding: 5px;
            }
            table td {
                text-align: left;
                vertical-align: top;
                margin: 20px;
                border: 1px solid var(--black);
                padding: 5px;
                font-size:0.7rem;
            }
            blockquote.style2 {
                margin-top: 0;
                margin-bottom: 10px;
                margin-left: 20px;
                margin-right: 20px;
                padding: 10px;
                border: none;
                width: 98%;
                font-size: 1rem;
                display: inline-block;
            }
            .style3 {
                margin: 20px;
                border-bottom: 1px solid var(--black);
                background-color: #c0C0c0;
                text-align: left;
            }
            .underline {
                text-decoration: underline;
            }
            .kb_entry {
                width: 85%;
                min-height: 0.3in;
                text-align: center;
                margin: 2px 5px 20px 5px;
                border: 1px solid #129FEA;
                background-color: #ff9;
                padding: 10px;
                vertical-align: middle;
                top: 50%;
            }
            .output_EMR {
                clear: both;
                float: left;
                border: 1px solid var(--black);
                width: 50%;
                padding: 0 10px;
                margin: 5px;
                height: 340px;
            }
            .output_reports {
                float: left;
                border:1px solid var(--black);
                width: 45%;
                padding: 0 10px;
                margin: 5px;
                height: 340px;
            }
            .ui-state-active {
                background: #97C4FE;

            }
            .field {
                color: var(--danger);
                font-weight: 600;
            }
            .bold {
                font-weight: 600;
            }
    </style>
    </head>
    <body style="font-size:1.2em; padding:25px;">
        <div class="w-100" style="position:absolute; top: 0; left: 0; height: 30px; background-color: #C9DBF2; font-family: 'FontAwesome', sans-serif; font-weight:400; font-size:1.1rem; padding:5px 10px 5px 10px;">
<img class="little_image left" height="18" src="<?php echo $GLOBALS['webroot']; ?>/sites/default/images/login_logo.gif" />  OpenEMR: Eye Exam <span class="bold">Shorthand Help</span>
        </div>
<br />
        <button id="general_button">Introduction</button>
        <button id="hpi_button">HPI</button>
        <button id="pmh_button">PMH</button>
        <button id="external_button">External</button>
        <button id="antseg_button">Anterior Segment</button>
        <button id="retina_button">Retina</button>
        <button id="neuro_button">Neuro</button>
        <div id="container" name="container_group" style="margin:10;text-align:left;">

            <div id="accordion_general_group" name="accordion_group" class="ui-accordion text-left" style="margin:10; padding:20;">
                <h3 class="ui-accordion-header external">Introduction: Paper vs. EHR</h3>
                <div id="general" class='text-left'>
                    <blockquote class="style2">
                        <strong>"Documenting an exam on paper is faster because we develop our own shorthand."</strong><br/>
                        Starting with this "paper" shorthand, we forged an electronic Shorthand, specifically designed for rapid data entry.<br />
                        Using Shorthand, all your findings are entered in one text box,
                        and OpenEMR automatically knows how to store them.<br /><br />
                        The structure is simple: <strong>Field:text;Field:text;Field:text</strong><br /><br />
                        Click on any <strong>Shorthand</strong> icon <i class="fa fa-user-md fa-sm fa-2" name="Shorthand_kb" title="Open the Shorthand Window and display Shorthand Codes"></i> in the Eye Form and two things occur:<br />
                        <ol>
                            <li> The Shorthand <strong>textbox</strong> opens </li>
                            <li> Shorthand <strong class="text-danger">Field</strong> names are visible</li>
                        </ol>
                            <br />
                        In the Shorthand textbox, type the <strong>Field</strong> name, then a colon, followed by your findings.
                        <br />
                        Look around the form - openEMR: Eye Exam is automatically filled.<br />
                        Done. No extra clicks.<br />

                        <hr />
                        This tutorial shows you how to document each area using Shorthand.  <br />
                        We'll show you how to complete the HPI, PMH, POH, Medication list, Surgical History and Allergies.<br />
                        As an example, using a handful of lines of typing in the Shorthand textbox,<br />
                        you will document all your normal findings <strong>and more than 40 different clinical issues</strong>.
                            <br />
                            That's a lot to document and one mighty complicated patient!<br />
                            Combined it may be many more issues than we would see on a routine day, with routine patients, but it could happen...  <br />
                        Documenting this many findings would take a little bit of time on paper, and a lifetime in a typical EHR. <br />
                        The average typist can now do it <strong>in less than a minute.</strong>  A normal encounter can be accurately documented in seconds.
                        <hr />

                        <h4 class="bold">HPI: </h4>
                        <textarea class="kb_entry">D;CC:"My eyes are tearing and there is a yellow discharge";hpi:The symptoms began last week and the discharged turned yellow yesterday.  No photophobia.  The redness spread from the right to the left eye two days ago.;</textarea>
                        <button id="hpi_button2">Details</button>
                        <br />
                        <h4 class="bold">PMH: </h4>
                        <textarea class="kb_entry">POH: POAG.Myopia. Dry Eye; POS:Phaco/IOL OD 4/4/1994.Phaco/IOL OS 4/24/1995. Yag/PCO OD 6/5/1999;Meds:Timolol 0.5% GFS QHS OU. Latanoprost 0.01% QHS OU.
Trazadone 50mg PO QHS.Famvir 500mg PO TID;Surg:Appendectomy 1998. Choly 2010.Lap Band 2014.;All:sulfa - hives.PCN - SOB;</textarea>
                        <button id="pmh_button2">Details</button>
                        <br />

                        <h4 class="bold">External: </h4>
                        <textarea class="kb_entry">D;bll:+2 meibomitis;rll:frank ect, 7x6mm lid margin bcc lat.a;bul:2mm ptosis;rul.+3 dermato.a</textarea>
                        <button id="external_button2">Details</button>
                        <br /><h4 class="bold">Anterior Segment:</h4>
                        <textarea class="kb_entry">D;bc:+2 inj;bk:med pter;rk:mod endo gut.a;bac:+1 fc, +1 pig cells</textarea>
                        <button id="antseg_button2">Details</button>

                        <br />
                        <h4 class="bold">Retina:</h4>
                        <textarea class="kb_entry">D;bd:+2 bowtie pallor;rcup:0.6Vx0.4H w/ inf notch;lcup:0.5;rmac:+2 BDR, +CSME;lmac:flat, tr BDR;v:+PPDR, ++venous beading;rp:ht 1 o,no vh;</textarea>
                        <button id="retina_button2">Details</button>

                        <h4 class="bold">Strabismus:</h4>
                        <textarea class="kb_entry">scDist;5:8ix 1rht;4:10ix;6:6ix;2:15xt;8:5ix;ccDist;4:5ix;5:ortho;6:ortho</textarea>
                        <button id="neuro_button2">Details</button>

                        <hr />
                        Below all these lines are strung together. Copy and paste this into a test patient's chart.  <br />
                        Voila! HPI, PMH, POH, Medications Allergies and 40 clinical findings + normals, are documented.
                        <hr />

                        <textarea class="kb_entry" style="height:2.3in;">CC:"My eyes are tearing and there is a yellow discharge";hpi:The symptoms began last week and the discharged turned yellow yesterday.  No photophobia.  The redness spread from the right to the left eye two days ago.;
POH:POAG. Myopia. Dry Eye; POS: Phaco/IOL OD 4/4/1994.Phaco/IOL OS 4/24/1995. Yag/PCO OD 6/5/1999;Meds:Timolol 0.5% GFS QHS OU. Latanoprost 0.01% QHS OU.
Trazadone 50mg PO QHS.Famvir 500mg PO TID;Surg:Appendectomy 1998. Choly 2010.Lap Band 2014.;All:sulfa - hives.PCN - SOB;
D;bll:+2 meibomitis;rll:frank ect, 7x6mm lid margin bcc lat.a;bul:2mm ptosis;rul:+3 dermato.a
bc:+2 inj;bk:med pter;rk:mod endo gut.a;bac:+1 fc, +1 pig cells;
bd:+2 bowtie pallor;rcup:0.6Vx0.4H w/ inf notch;lcup:0.5;rmac:+2 BDR, +CSME;lmac:flat, tr BDR;v:+PPDR, ++venous beading;rp:ht 1 o,no vh;
scDist;5:8ix 1rht;4:10ix;6:6ix;2:15xt;8:5ix;ccDist;4:5ix;5:ortho;6:ortho</textarea>

                        <br />
                        Get back to working at the speed of your brain.<br /><br /><br />

                        <small>Now imagine documenting this without typing, without a scribe?  It is not that far away...</small>

                    </blockquote>
                </div>

                <h3 class="ui-accordion-header external">Shorthand Structure</h3>
                <div id="general" style="text-align:left;">
                    <h4><strong>Usage:</strong>  field:text(.a)(;)</h4>
                    <blockquote class="style2"><i>where: <br /></i>
                        <strong>Field</strong> is the shorthand term for the clinical field.<br/>
                        <strong>text</strong> is the complete or shorthand data to enter into this <strong>field</strong>:
                        <br />
                        <strong>field</strong> and <strong>text</strong> are separated by a "<strong>:</strong>" colon.
                        <br />
                        The trailing "<strong>.a</strong>"
                        is optional and will <strong>append</strong> the <strong>text</strong> to the data already in the field, instead of replacing it.<br />
                        The semi-colon "<strong>;</strong>" is used to divide entries, allowing multiple field entries simultaneously. <br />
                        <small><i>The semi-colon separates entries.</i></small><br />
                        After pressing <strong>Enter/Return</strong> or <strong>Tab</strong>, the data are submitted and the form is populated.  <br />
                    </blockquote>
                </div>
            </div>

            <div id="accordion_hpi_group" name="accordion_group" class="ui-accordion" style="text-align:left;margin:10;padding:20;">
                <div name="hpi" class="ui-accordion external">
                    <h3 name="hpi_group" id="hpi_0">History of Present Illness: Shorthand Walk Through</h3>
                    <div name="hpi_group" class="external" style="text-align:left;margin:0;padding:0;">
                        <a name="example_hpi"></a>
                        <blockquote class="style2">
                            <h4 class="underline">Shorthand</h4>
                            <textarea class="kb_entry"  style="min-height:1in;">CC:"My eyes are tearing and there is a yellow discharge";hpi:The symptoms began last week and the discharged turned yellow yesterday.  No photophobia.  The redness spread from the right to the left eye two days ago.;
                            </textarea>
                            <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_hpi.png" style="width: 90%;" alt="Shorthand Example: Anterior Segment">
                            <br />
                        </blockquote>
                    </div>
                </div>
            </div>

            <div id="accordion_pmh_group" name="accordion_group" class="ui-accordion" style="text-align:left;margin:10;padding:20;">
                <div name="pmh" class="ui-accordion external">
                    <h3 name="pmh_group" id="pmh_0">Past Medical History: Shorthand Walk Through</h3>
                    <div name="pmh_group" class="external" style="text-align:left;margin:0;padding:0;">
                        <a name="example_pmh"></a>
                        <blockquote class="style2">
                            <h4 class="underline">Shorthand</h4>
                            <textarea class="kb_entry" style="height:1in;">POH:POAG. Myopia. Dry Eye; POS:Phaco/IOL OD 4/4/1994.Phaco/IOL OS 4/24/1995.
Yag/PCO OD 6/5/1999;Meds:Timolol 0.5% GFS QHS OU. Latanoprost 0.01% QHS OU.
Trazadone 50mg PO QHS.Famvir 500mg PO TID;Surg:Appendectomy 1998.
Choly 2010.Lap Band 2014.;All:sulfa - hives.PCN - SOB;</textarea>
                            <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_pmh.png" style="width: 90%;" alt="Shorthand Example: Anterior Segment">
                            <br />
                        </blockquote>
                    </div>
                </div>
            </div>

            <div id="accordion_external_group" name="accordion_group" class="ui-accordion" style="text-align:left;margin:10;padding:20;">
                <div name="external" class="ui-accordion external">
                    <h3 name="external_group" id="external_0">External: Shorthand Walk Through</h3>
                    <div name="external_group" class="external" style="text-align:left;margin:0;padding:0;">
                        <a name="example_ext"></a>
                        <blockquote class="style2">
                            <h4 class="underline">Shorthand</h4>
                            <textarea class="kb_entry">D;bll:+2 meibomitis;rll:frank ect, 7x6mm lid margin bcc lat.a;bul:2mm ptosis;rul.+3 dermato.a
                            </textarea>
                            <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_ext.png" style="width: 90%;" alt="Shorthand Example: Anterior Segment">
                            <br />
                        </blockquote>
                    </div>
                    <h3>External: Example Output</h3>
                    <div id="external_output" class="m-0 p-0 text-left">
                        <blockquote class="style2">
                            Input:<br /><br />
                            <strong>D;bll:+2 meibomitis;rll:frank ect, 7x6mm lid margin bcc lat.a;bul:2mm ptosis;rul.+3 dermato.a</strong>
                            <br />
                            <br />
                            Output:
                            <br /><br />
                            <div class="output_EMR" >
                                <h4>Eye Exam</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_ext_EMR.png" width="95%" alt="Shorthand Example: openEMR">
                            </div>
                            <div class="output_reports">
                                <h4>Reports</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_ext_report.png" width="75%" alt="Shorthand Example: Reports">
                            </div>
                        </blockquote>
                    </div>
                    <h3>External: Field Codes and Shorthand/Abbreviations</h3>
                    <div id="external_codes" class="text-left border-0" style="clear: both;">
                        <a name="output_external"></a>
                        <blockquote class="style2">
                            <table class="border-0" style="margin: 10;">
                                <tr class="style3"><th>Clinical Field</th><th>Shorthand* Field</th><th>Example Shorthand**</th><th>EMR: Field text</th></tr>
                                <tr >
                                    <td>Default values</td><td>D or d</td>
                                    <td><strong class="text-danger">d;</strong><br /><strong class="text-danger">D;</strong></td>
                                    <td>All fields with defined default values are <strong>erased</strong> and filled with default values.<br />Fields without defined default values are not affected. </td>
                                </tr>
                                <tr >
                                    <td>Default External values</td><td>DEXT or dext</td>
                                    <td><strong class="text-danger">dext;</strong><br /><strong class="text-danger">DEXT;</strong></td>
                                    <td>All External Exam fields with defined default values are <strong>erased</strong> and filled with default values.<br />External Fields without defined default values and all other fields on the form are not affected. </td>
                                </tr>
                                <tr >
                                    <td>Right Brow</td><td>rb or RB</td>
                                    <td><strong class="text-danger">rb</strong>:1cm lat ptosis<br /><strong class="text-danger">rb</strong>:med 2cm SCC</td>
                                    <td>1cm lateral ptosis<br />medial 2cm SCC</td>
                                </tr>
                                <tr>
                                    <td>Left Brow</td><td>lb or LB</td>
                                    <td><strong class="text-danger">lb</strong>:loss of lat brow follicles<br /><strong class="text-danger">lb</strong>:no rhytids from VIIth nerve palsy</td>
                                    <td>loss of lateral brow follicles<br />no rhytids from VIIth nerve palsy</td>
                                </tr>
                                <tr>
                                    <td>Both Brows/Forehead</td><td>fh or FH<br />bb or BB</td>
                                    <td><strong class="text-danger">fh</strong>:+3 fh rhytids<br /><strong class="text-danger">BB</strong>:+3 glab rhytids</td>
                                    <td>+3 forehead rhytids<br />+3 glabellar rhytids</td>
                                </tr>
                                <tr>
                                    <td>Right Upper Lid</td><td>rul or RUL</td>
                                    <td><strong class="text-danger">RUL</strong>:1cm lat ptosis<br /><strong class="text-danger">rul</strong>:med 2cm SCC</td>
                                    <td>1cm lateral ptosis<br />medial 2cm SCC</td>
                                </tr>
                                <tr>
                                    <td>Left Upper Lid</td><td>lul or LUL</td>
                                    <td><strong class="text-danger">LUL</strong>:1cm lat ptosis<br /><strong class="text-danger">lul</strong>:med 2cm SCC</td>
                                    <td>1cm lateral ptosis<br />medial 2cm SCC</td>
                                </tr>
                                <tr>
                                    <td>Right Lower Lid</td><td>rll or RLL</td>
                                    <td><strong class="text-danger">rll</strong>:1cm lat ptosis<br /><strong class="text-danger">rll</strong>:med 2cm SCC</td>
                                    <td>1cm lateral ptosis<br />medial 2cm SCC</td>
                                </tr>
                                <tr>
                                    <td>Left Lower Lid</td><td>lll or LLL</td>
                                    <td><strong class="text-danger">lll</strong>:0.5cm lat ptosis<br /><strong class="text-danger">LLL</strong>:med 2cm SCC</td>
                                    <td>1cm lateral ptosis<br />medial 2cm SCC</td>
                                </tr>
                                <tr>
                                    <td>Both Lower Lids</td><td>bll or BLL</td>
                                    <td><strong class="text-danger">lll</strong>:0.5cm lat ptosis<br /><strong class="text-danger">LLL</strong>:med 2cm SCC</td>
                                    <td>1cm lateral ptosis<br />medial 2cm SCC</td>
                                </tr>
                                <tr>
                                    <td>All 4 Lids</td><td>4xl or 4XL</td>
                                    <td><strong class="text-danger">4xl</strong>:+2 laxity<br /><strong class="text-danger">4xL</strong>:+2 dermato</td>
                                    <td>+2 laxity<br />+2 dermatochalasis</td>
                                </tr>
                                <tr>
                                    <td>Right Medial Canthus</td><td>rmc or RMC</td>
                                    <td><strong class="text-danger">rmc</strong>:1cm bcc<br /><strong class="text-danger">RMC</strong>:healed dcr scar</td>
                                    <td>1cm BCC<br />healed DCR scar</td>
                                </tr>
                                <tr>
                                    <td>Left Medial Canthus</td><td>lmc or LMC</td>
                                    <td><strong class="text-danger">lmc</strong>:acute dacryo, tender w/ purulent drainage<br /><strong class="text-danger">lmc</strong>:1.2cm x 8mm mass</td>
                                    <td>acute dacryo, tender with purulent drainage<br />1.2cm x 8mm mass</td>
                                </tr>
                                <tr>
                                    <td>Both Medial Canthi</td><td>bmc or BMC</td>
                                    <td><strong class="text-danger">bmc</strong>:chronic dacryo, non-tender<br /><strong class="text-danger">BMC</strong>:scaling, ulcerated lesion</td>
                                    <td>chronic dacryo, non-tender<br />scaling, ulcerated lesion</td>
                                </tr>
                                <tr>
                                    <td>Right Adnexa</td><td>rad or RAD</td>
                                    <td><strong class="text-danger">rad</strong>:1.8x2.0cm bcc lat<br /><strong class="text-danger">RAD</strong>:healed DCR scar</td>
                                    <td>1cm BCC<br />healed DCR scar</td>
                                </tr>

                                <tr>
                                    <td>Left Adnexa</td><td>lad or LAD</td>
                                    <td><strong class="text-danger">lad</strong>:1cm lacr cyst protruding under lid<br /><strong class="text-danger">LAD</strong>:1.2cm x 8mm mass</td>
                                    <td>1cm lacrimal cyst protruding under lid<br />1.2cm x 8mm mass</td>
                                </tr>
                                <tr>
                                    <td>Both Adnexae</td><td>bad or BAD</td>
                                    <td><strong class="text-danger">bad</strong>:lacr gland prolapse<br /><strong class="text-danger">BAD</strong>:lat orb wall missing</td>
                                    <td>lacrimal gland prolapse<br />lateral orbital wall missing</td>
                                </tr>
                            </table>
                            <br />*<i>case insensitive</i><br />
                            **<i>The default action is to replace the field with the new text.
                            <br />
                            Adding <strong>".a"</strong> at the end of a <strong>text</strong> section will append the current text instead of replacing it.
                            <br >For example, <strong>entering "4xL:+2 meibomitis.a" will <u>append</u> "+2 meibomitis"</strong>
                            to each of the eyelid fields, RUL/RLL/LUL/LLL.</i>

                            <hr />
                            <a name="abbrev_external"></a>
                            <h2 class="underline">External Shorthand Abbreviations:</h2>

                            The following terms will be expanded from their shorthand to full expression in the EMR fields:

                            <table style="border:1px solid black; margin:10; width:85%;">
                                    <tr class="style3"><th>Enter this:</th><th>Get this:</th></tr>
                                    <tr><td>inf</td><td>inferior</td></tr>
                                    <tr><td>sup</td><td>superior</td></tr>
                                    <tr><td>nas</td><td>nasal</td></tr>
                                    <tr><td>temp</td><td>temporal</td></tr>
                                    <tr><td>med</td><td>medial</td></tr>
                                    <tr><td>lat</td><td>lateral</td></tr>
                                    <tr><td>dermato</td><td>dematochalasis</td></tr>
                                    <tr><td>w/</td><td>with</td></tr>
                                    <tr><td>lac</td><td>laceration</td></tr>
                                    <tr><td>lacr</td><td>lacrimal</td></tr>
                                    <tr><td>dcr</td><td>DCR</td></tr>
                                    <tr><td>bcc</td><td>BCC</td></tr>
                                    <tr><td>scc</td><td>SCC</td></tr>
                                    <tr><td>sebca</td><td>sebaceous cell</td></tr>
                                    <tr><td>tr</td><td>trace</td></tr>
                            </table>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div id="accordion_antseg_group" name="accordion_group" class="ui-accordion text-left" style="margin: 10; padding: 20;">
                <div name="antseg">
                    <h3 class="antseg" id="antseg_0" name="antseg_group">Anterior Segment: Shorthand Walk Through</h3>
                    <div id="antseg_input" class="ANTSEG text-left m-0 p-0">
                            <a name="example_antseg"></a>

                            <blockquote class="style2">
                                <h4 class="underline">Shorthand</h4>
                                <textarea class="kb_entry">D;bc:+2 inj;bk:med pter;rk:mod endo gut.a;bac:+1 fc, +1 pig cells
                                </textarea>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_antseg.png" alt="Shorthand Example: Anterior Segment">
                                <br />
                            </blockquote>
                    </div>
                    <h3>Anterior Segment: Example Output</h3>
                    <div id="external_output" class="text-left m-0" style="padding:20;">
                        <blockquote class="style2">
                            Input:<br /><br />
                            <strong>D;bc:+2 inj;bk:med pter;rk:mod endo gut.a;bac:+1 fc, +1 pig cells</strong><br />
                            <br />
                            Output:
                            <br /><br />
                            <div class="output_EMR  card">
                                <h4>Eye Exam</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_antseg_EMR.png" width="90%" alt="Shorthand Example: openEMR">
                            </div>
                            <div class="output_reports">
                                <h4>Reports</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_antseg_report.png" width="95%" alt="Shorthand Example: Reports">
                            </div>
                        </blockquote>
                    </div>
                    <h3>Anterior Segment: Field Codes and Shorthand/Abbreviations</h3>
                    <div id="antseg_codes" class="text-left border-0" style="clear:both;">
                        <a name="output_antseg"></a>
                        <blockquote class="style2">
                            <table class="border-0" style="margin:10; padding:10;">
                                <tr class="style3"><th>Clinical Field</th><th>Shorthand* Field</th><th>Example Shorthand**</th><th>EMR: Field text</th></tr>
                                <tr >
                                    <td>Default values</td><td>D or d</td>
                                    <td><span class="field">d</span>;<br /><span class="field">D</span>;</td>
                                    <td>All fields with defined default values are <strong>erased</strong> and filled with default values.<br />Fields without defined default values are not affected. </td>
                                </tr>
                                <tr >
                                    <td>Default Anterior Segment values</td><td>DANTSEG or das</td>
                                    <td><strong class="text-danger">dantseg;</strong><br /><strong class="text-danger">DAS;</strong></td>
                                    <td>All Anterior Segment fields with defined default values are <strong>erased</strong> and filled with default values.<br />Anterior Segment Fields without defined default values and all other fields on the form are not affected. </td>
                                </tr>
                                <tr >
                                    <td>Conjunctiva</td><td>Right = rc<br />Left = lc<br />Both = bc or c</td>
                                    <td><span class="field">rc:</span>+1 inj<br /><span class="field">c:</span>med pter</td>
                                    <td>"+1 injection" (right conj only)<br />"medial pterygium" (both right and left fields are filled)</td>
                                </tr>
                                <tr>
                                    <td>Cornea</td><td>Right = rc<br />Left = lc<br />Both = bk or k</td>
                                    <td><span class="field">rk:</span>+3 spk<br /><span class="field">k:</span>+2 end gut<strong class="text-success">;</strong><span class="field">rk:</span>+1 str edema<strong class="text-success">.a</strong></td>
                                    <td>"+3 SPK" (right cornea only)<br />"+2 endothelial guttatae" (both cornea fields) AND "+1 stromal edema" (appended to Right cornea field)</td>
                                </tr>
                                <tr>
                                    <td>Anterior Chamber</td><td>Right = rac<br />Left = lac<br />Both = bac or ac</td>
                                    <td><span class="field">rac:</span>+1 fc<br /><span class="field">ac:</span>+2 flare</td>
                                    <td>"+1 flare/cell" (right A/C field only)<br />"+2 flare" (both A/C fields)</td>
                                </tr>
                                <tr>
                                    <td>Lens</td><td>Right = rl<br />Left = ll<br />Both = bl or l</td>
                                    <td><span class="field">RL:</span>+2 NS<br /><span class="field">ll:</span>+2 NS<strong class="text-success">;</strong><span class="field">l:</span>+3 ant cort spokes.a</td>
                                    <td>"+2 NS" (right lens only)<br />"+2 NS" (left lens fields) AND "+3 anterior cortical spokes" (appended to both lenses)</td>
                                </tr>
                                <tr>
                                    <td>Iris</td><td>Right = ri<br />Left = li<br />Both = bi or i</td>
                                    <td><strong class="text-danger">bi.</strong>12 0 iridotomy<br /><span class="field">ri:</span>+2 TI defects<strong class="text-success">.a</strong><strong style="color:navy">;</strong><span class="field">li</span>.round</td>
                                    <td>"12 o'clock iriditomy" (both iris fields)<br />", +2 TI defects" (right iris field) AND "round" (left iris field only)</td>
                                </tr>
                                <tr>
                                    <td>Gonio</td><td>Right = rg<br />Left = lg<br />Both = bg or g</td>
                                    <td><span class="field">rg:</span>ss 360<br /><span class="field">lg:</span>3-5 o angle rec</td>
                                    <td>SS 360<br />3-5 o'clock angle recession</td>
                                </tr>
                                <tr>
                                    <td>Pachymetry</td><td>Right = rp<br />Left = lp<br />Both = bp or p</td>
                                    <td><span class="field">lp:</span>625 um<br /><span class="field">p:</span>550 um</td>
                                    <td>"625 um" (left pachymetry field)<br />"500 um" (both pachymetry fields)</td>
                                </tr>
                                <tr>
                                    <td>Schirmer I</td><td>Right = rsch1<br />Left = lsch1<br />Both = bsch1 or sch1</td>
                                    <td><span class="field">rsch1:</span>5mm<br /><span class="field">sch1:</span>&lt; 10mm/5 minutes</td>
                                    <td>"5mm" (right field only)<br />"&lt; 10mm/5 minutes" (both fields)</td>
                                </tr>
                                <tr>
                                    <td>Schirmer II</td><td>Right = rsch2<br />Left = lsch2<br />Both = bsch2 or sch2</td>
                                    <td><span class="field">rsch2:</span>9 mm<br /><span class="field">sch2:</span>&lt; 10mm/5 minutes</td>
                                    <td>"9 mm" (right field only)<br />"&lt; 10mm/5 minutes" (both fields)</td>
                                </tr>
                                <tr>
                                    <td>Tear Break-up Time</td><td>Right = RTBUT<br />Left = LTBUT<br />Both = BTBUT or tbut</td>
                                    <td><span class="field">tbut:</span>&lt; 10 seconds<br /><span class="field">Rtbut:</span>5 secs<strong class="text-success">;</strong><span class="field">ltbut:</span>9 seconds<strong class="text-success">;</strong></td>
                                    <td>"10 seconds" (both fields)<br />"5 seconds" (right) AND "9 seconds" (left)</td>
                                </tr>
                            </table>
                            <br />*<i>case insensitive</i><br />
                            **<i>The default action is to replace the field with the new text.
                            <br />
                            Adding <strong>".a"</strong> at the end of a <strong>text</strong> section will append the current text instead of replacing it.
                            <br >For example, entering <strong>"bk:+2 str scarring.a" will <span class="underline bold">append</span> "+2 stromal scarring"</strong> to both the right (rk) and left cornea fields (lk).</i>
                            <br />

                            <br />
                            <a name="abbrev_antseg"></a>
                            <h2 class="underline">External Shorthand Abbreviations:</h2>

                            The following terms will be expanded from their shorthand to full expression in the EMR fields:
                            <table style="border:1px solid black;margin:10;width:85%;">
                                    <tr class="style3"><th>Enter this:</th><th>Get this:</th></tr>
                                    <tr><td>inf</td><td>inferior</td></tr>
                                    <tr><td>sup</td><td>superior</td></tr>
                                    <tr><td>nas</td><td>nasal</td></tr>
                                    <tr><td>temp</td><td>temporal</td></tr>
                                    <tr><td>med</td><td>medial</td></tr>
                                    <tr><td>lat</td><td>lateral</td></tr>
                                    <tr><td>dermato</td><td>dematochalasis</td></tr>
                                    <tr><td>w/</td><td>with</td></tr>
                                    <tr><td>lac</td><td>laceration</td></tr>
                                    <tr><td>lacr</td><td>lacrimal</td></tr>
                                    <tr><td>dcr</td><td>DCR</td></tr>
                                    <tr><td>bcc</td><td>BCC</td></tr>
                                    <tr><td>scc</td><td>SCC</td></tr>
                                    <tr><td>sebca</td><td>sebaceous cell</td></tr>
                                    <tr><td>tr</td><td>trace</td></tr>
                            </table>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div id="accordion_retina_group" name="accordion_group" class="ui-accordion" style="text-align:left; margin:10; padding:20;">
                <div name="retina">
                    <h3 class="retina">Retina: Shorthand Walk Through</h3>
                    <div id="retina_input" class="RETINA" style="text-align:left; margin:0; padding:0;">
                        <blockquote class="style2">
                            <h4 class="underline">Shorthand</h4>
                            <textarea class="kb_entry">D;bd.+2 bowtie pallor;rcup.0.6Vx0.4H w/ inf notch;lcup.0.5;rmac.+2 BDR, +CSME;lmac.flat, tr BDR;v.+PPDR, ++venous beading;rp.ht 1 o,no vh;
                            </textarea>
                            <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_retina.png" alt="Shorthand Example: Anterior Segment">
                            <br />
                        </blockquote>
                    </div>
                    <h3>Retina: Example Output</h3>
                    <div id="retina_output" style="text-align:left;margin:0;padding:20;">
                        <blockquote class="style2">
                            Input:<br /><br />
                            <strong>D;bd:+2 bowtie pallor;rcup:0.6Vx0.4H w/ inf notch;lcup:0.5;rmac:+2 BDR, +CSME;lmac:flat, tr BDR;v:+PPDR, ++venous beading;rp:ht 1 o,no vh;
                            </strong><br />
                            <br />
                            Output:
                            <br /><br />
                            <div class="output_EMR">
                                <h4>Eye Exam</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_retina_EMR.png" width="95%" alt="Shorthand Example: openEMR" />
                            </div>
                            <div class="output_reports">
                                <h4>Reports</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_retina_report.png" width="95%" alt="Shorthand Example: Reports" />
                            </div>
                        </blockquote>
                    </div>
                    <h3>Retina: Field Codes and Shorthand/Abbreviations</h3>
                    <div id="retina_codes" style="clear:both; border: 0; text-align:left;">
                        <blockquote class="style2">
                            <table style="border:1px solid black; margin:10; width:85%;">
                                <tr class="style3">
                                        <th>Clinical Field</th>
                                        <th>Shorthand* Field</th>
                                        <th>Example Shorthand**</th>
                                        <th>EMR: Field text</th>
                                </tr>
                                    <tr >
                                        <td>Default values</td><td>D or d</td>
                                        <td><span class="field">d</span>;<br /><span class="field">D</span>;</td>
                                        <td>All fields with defined default values are <strong>erased</strong> and filled with default values.<br />Fields without defined default values are not affected. </td>
                                    </tr>
                                    <tr >
                                        <td>Default Retina values</td><td>DRET or dret</td>
                                        <td><strong class="text-danger">dext;</strong><br /><strong class="text-danger">DEXT;</strong></td>
                                        <td>All Retina/Posterior Segment Exam fields with defined default values are <strong>erased</strong> and filled with default values.<br />Retinal Fields without defined default values and all other fields on the form are not affected. </td>
                                    </tr>
                                    <tr >
                                        <td>Disc</td>
                                        <td>Right = rd<br />Left = ld<br />Both = bd</td>
                                        <td><span class="field">rd:</span>temp pallor, PPA<br /><span class="field">bd:</span>NVD at 5 o</td>
                                        <td>"temporal pallor, PPA" (right disc only)<br />"NVD at 5 o'clock" (both right and left disc fields)</td>
                                    </tr>
                                    <tr>
                                        <td>Cup</td><td>Right = rcup<br />Left = lcup<br />Both = bcup or cup</td>
                                        <td><span class="field">rcup:</span>0.5 w/ inf notch<br /><span class="field">cup:</span>temp scalloping, 0.5<strong class="text-success">.a</strong><strong class="text-success">;</strong></td>
                                        <td>"0.5 with inferior notch (right cup only)<br />"temporal scalloping, 0.5" (appended to both cup fields)</td>
                                    </tr>
                                    <tr>
                                        <td>Macula</td><td>Right = rmac<br />Left = lmac<br />Both = bmac or mac</td>
                                        <td><span class="field">rmac:</span>central scar 500um<br /><span class="field">mac:</span>soft drusen, - heme.a</td>
                                        <td>"central scar 500um" (right macular field only)<br />"soft drusen, - heme" (appended to both macular fields)</td>
                                    </tr>
                                    <tr>
                                        <td>Vessels</td><td>Right = rv<br />Left = lv<br />Both = bv or v</td>
                                        <td><span class="field">RV:</span>1:2, +2 BDR<br /><span class="field">lv:</span>+CSME w/ hard exudate sup to fov (300um)<strong class="text-success">;</strong><br /><span class="field">v:</span>narrow arterioles, 1:2<strong class="text-success">.a;</strong></td>
                                        <td>"1:2, +2 BDR" (right vessels only)<br />"+CSME with hard exudate superior to fovea (300um)" (left vessel field only)<br />"narrow arterioles, 1:2" (appended to both vessel fields)</td>
                                    </tr>
                                    <tr>
                                        <td>Periphery</td><td>Right = rp<br />Left = lp<br />Both = bp or p</td>
                                        <td><span class="field">rp:</span>12 0 ht, no heme, amenable to bubble<strong class="text-success">;</strong><br /><strong class="text-danger">bp.</strong>1 clock hour of lattice 2 o<strong class="text-success">.a</strong><strong style="color:navy">;</strong></td>
                                        <td>"12 o'clock horseshoe tear, no heme, amenable to bubble" (right periphery field)<br />"1 clock hour of lattice 2 o'clock" (appended to both periphery fields)</td>
                                    </tr>
                                    <tr>
                                        <td>Central Macular Thickness</td><td>Right = rcmt<br />Left = lcmt<br />Both = bcmt or cmt</td>
                                        <td><span class="field">rcmt:</span>254<br /><span class="field">cmt:</span>flat</td>
                                        <td>254 (right CMT only)<br />flat (both CMT fields)</td>
                                    </tr>
                            </table>
                            <br />*<i>case insensitive</i><br />
                            **<i>The default action is to replace the field with the new text.
                            <br />
                            Adding <strong>".a"</strong> at the end of a <strong>text</strong> section will append the current text instead of replacing it.
                            <br >For example, entering <strong>"bcup:0.5 w/ inf notch.a" will <span class="underline bold">append</span> "0.5 with inferior notch"</strong> to both the right (rcup) and left cup fields (lcup).</i>
                            <br />

                            <br />
                            <a name="abbrev_retina"></a>
                            <h2 class="underline">Retina Shorthand Abbreviations:</h2>

                            The following terms will be expanded from their shorthand to full expression in the EMR fields:

                            <table style="border:1px solid black; margin:10; width:85%;">
                                <tr class="style3">
                                    <th>Enter this:</th>
                                    <th>Get this:</th>
                                </tr>
                                <tr>
                                    <td>inf</td>
                                    <td>inferior</td>
                                </tr>
                                <tr>
                                    <td>sup</td>
                                    <td>superior</td>
                                </tr>
                                <tr>
                                    <td>nas</td>
                                    <td>nasal</td>
                                </tr>
                                <tr>
                                    <td>temp</td>
                                    <td>temporal</td>
                                </tr>
                                <tr>
                                    <td>med</td>
                                    <td>medial</td>
                                </tr>
                                <tr>
                                    <td>lat</td>
                                    <td>lateral</td>
                                </tr>
                                <tr>
                                    <td>csme</td>
                                    <td>CSME</td>
                                </tr>
                                <tr>
                                    <td>w/</td>
                                    <td>with</td>
                                </tr>
                                <tr>
                                    <td>bdr</td>
                                    <td>BDR</td>
                                </tr>
                                <tr>
                                    <td>ppdr</td>
                                    <td>PPDR</td>
                                </tr>
                                <tr>
                                    <td>ht</td>
                                    <td>horsheshoe tear</td>
                                </tr>
                                <tr>
                                    <td>ab</td>
                                    <td>air bubble</td>
                                </tr>
                                <tr>
                                    <td>c3f8</td>
                                    <td>C3F8</td>
                                </tr>
                                <tr>
                                    <td>ma</td>
                                    <td>macroaneurysm</td>
                                </tr>
                                <tr>
                                    <td>tr</td>
                                    <td>trace</td>
                                </tr>
                                <tr>
                                    <td>mias</td>
                                    <td>microaneurysm</td>
                                </tr>
                                <tr>
                                    <td>ped</td>
                                    <td>PED</td>
                                </tr>
                                <tr>
                                    <td>1 o</td>
                                    <td> 1 o'clock</td>
                                </tr>
                                <tr>
                                    <td>2 o</td>
                                    <td>2 o'clock</td>
                                </tr>
                                <tr>
                                    <td>3 o</td>
                                    <td> 3 o'clock</td>
                                </tr>
                                <tr>
                                    <td>4 o</td>
                                    <td> 4 o'clock</td>
                                </tr>
                                <tr>
                                    <td>5 o</td>
                                    <td> 5 o'clock</td>
                                </tr>
                                <tr>
                                    <td>6 o</td>
                                    <td> 6 o'clock</td>
                                </tr>
                                <tr>
                                    <td>7 o</td>
                                    <td> 7 o'clock</td>
                                </tr>
                                <tr>
                                    <td>8 o</td>
                                    <td> 8 o'clock</td>
                                </tr>
                                <tr>
                                    <td>9 o</td>
                                    <td> 9 o'clock</td>
                                </tr>
                                <tr>
                                    <td>10 o</td>
                                    <td> 10 o'clock</td>
                                </tr>
                                <tr>
                                    <td>11 o</td>
                                    <td> 11 o'clock</td>
                                </tr>
                                <tr>
                                    <td>12 o</td>
                                    <td> 12 o'clock</td>
                                </tr>
                                <tr>
                                    <td>mac</td>
                                    <td>macula</td>
                                </tr>
                                <tr>
                                    <td>fov</td>
                                    <td>fovea</td>
                                </tr>
                                <tr>
                                    <td>vh</td>
                                    <td>vitreous hemorrhage</td>
                                </tr>
                            </table>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div id="accordion_neuro_group" name="accordion_group" class="ui-accordion" style="text-align:left; margin:10px; padding:20px;">
                <div name="neuro">
                    <h3 class="neuro">Neuro: Shorthand Walk Through</h3>
                    <div id="neuro_input" class="neuro" style="text-align:left;margin:0;padding:0;">
                        <blockquote class="style2">
                            <h4 class="underline">Shorthand</h4>
                            <textarea class="kb_entry">scDist;5:8ix 1rht;4:10ix;6:6ix;2:15xt;8:5ix;ccDist;4:5ix;5:ortho;6:ortho;
                            </textarea>
                            <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_neuro.png" alt="Shorthand Example: Anterior Segment" />
                            <br />
                        </blockquote>
                    </div>
                    <h3>Neuro: Example Output</h3>
                    <div id="neuro_output" style="text-align:left; margin:0; padding:20px;">
                        <a name="output_neuro"></a>
                        <blockquote class="style2">
                            Input:<br /><br />
                            <strong>scDist;5:8ix 1rht;4:10ix;6:6ix;2:15xt;8:5ix;ccDist;4:5ix;5:ortho;6:ortho;</strong><br />
                            <br />
                            Output:
                            <br /><br />
                            <div class="output_EMR">
                                <h4>Eye Exam</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_neuro_EMR1.png"  style="height: 200px; width:45%; margin:12px 0 0 20px; padding-left:10" alt="Shorthand Example: openEMR" />
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_neuro_EMR2.png"  style="float:right; height: 200px; width:45%;margin:10px 0 0 20px; padding-left:10px" alt="Shorthand Example: openEMR" />
                            </div>
                            <div class="output_reports">
                                <h4>Reports</h4>
                                <img src="<?php echo $GLOBALS['webroot']; ?>/interface/forms/eye_mag/images/sh_neuro_report.png" width="75%" alt="Shorthand Example: Reports" />
                            </div>
                        </blockquote>
                    </div>
                    <h3>Neuro: Field Codes and Shorthand/Abbreviations</h3>
                    <div id="neuro_codes" style="clear:both; border: 0;text-align:left;">
                        <blockquote class="style2">
                            <table style="border:1px solid black;margin:10;width:85%;">
                                    <tr class="style3"><th>Clinical Field</th><th>Shorthand* Field</th><th>Example Shorthand**</th><th>EMR: Field text</th></tr>
                                    <tr >
                                        <td>Default values</td><td>D or d</td>
                                        <td><span class="field">d</span>;<br /><span class="field">D</span>;</td>
                                        <td>All fields with defined default values are <strong>erased</strong> and filled with default values.<br />Fields without defined default values are not affected. </td>
                                    </tr>
                                    <tr>
                                        <td>Without correction at Distance</td><td>scDist</td>
                                        <td><strong class="text-danger">scdist</strong><strong class="text-success">;</strong></td>
                                        <td>scDIST is selected for ensuing values.</td>
                                    </tr>
                                    <tr>
                                        <td>With correction at Distance</td><td>scDist</td>
                                        <td><strong class="text-danger">ccdist</strong><strong class="text-success">;</strong></td>
                                        <td>ccDIST is selected for ensuing values.</td>
                                    </tr><tr>
                                        <td>Without correction at Near</td><td>scNear</td>
                                        <td><strong class="text-danger">scdist</strong><strong class="text-success">;</strong></td>
                                        <td>scDIST is selected for ensuing values.</td>
                                    </tr>
                                    <tr>
                                        <td>With correction at Near</td><td>scNear</td>
                                        <td><strong class="text-danger">scdist</strong><strong class="text-success">;</strong></td>
                                        <td>scDIST is selected for ensuing values.</td>
                                    </tr>
                            </table>
                            <br />*<i>case insensitive</i><br />
                            **<i>The default action is to replace the field with the new text.
                            <br />
                            Adding <strong>".a"</strong> at the end of a <strong>text</strong> section will append the current text instead of replacing it.
                            <br >For example, entering <strong>"4:5ix.a" will <span class="underline bold">append</span> "5 X(T)"</strong>
                            to any measurements previously entered into the right gaze field.</i>
                            <br />

                            <br />
                            <a name="abbrev_neuro"></a>
                            <h2 class="underline">Neuro Shorthand Abbreviations:</h2>

                            The following terms will be expanded from their shorthand to full expression in the EMR fields:

                            <table style="border:1px solid black; margin:10px; width:85%;">
                                <tr class="style3">
                                    <th>Strabismus</th>
                                    <th>Enter this:</th>
                                    <th>Get this:</th>
                                </tr>
                                <tr>
                                    <td>Exophoria</td>
                                    <td>x</td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <td>Intermittent Esotropia</td>
                                    <td>ie or e(t)</td>
                                    <td>E(T)</td>
                                </tr>
                                <tr>
                                    <td>Esoptropia</td>
                                    <td>et</td>
                                    <td>ET</td>
                                </tr>
                                <tr>
                                    <td>Esophoria</td>
                                    <td>e</td>
                                    <td>E</td>
                                </tr>
                                <tr>
                                    <td>Intermittent Exotropia</td>
                                    <td>ix or x(t)</td>
                                    <td>X(T)</td>
                                </tr>
                                <tr>
                                    <td>Exoptropia</td>
                                    <td>xt</td>
                                    <td>XT</td>
                                </tr>
                                <tr>
                                    <td>Hyperphoria</td>
                                    <td>h</td>
                                    <td>H</td>
                                </tr>
                                <tr>
                                    <td>Intermittent Hypertropia</td>
                                    <td>H(T)</td>
                                    <td>H(T)</td>
                                </tr>
                                <tr>
                                    <td>Hypertropia</td>
                                    <td>rht<br />lht</td>
                                    <td>RHT<br />LHT</td>
                                </tr>
                                <tr>
                                    <td>Hypotropia</td>
                                    <td>hyt</td>
                                    <td>HyT</td>
                                </tr>
                            </table>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
<?php exit; ?>

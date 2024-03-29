
 <form name="form_ajax_redir_1" method="post">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
 </form>
 <form name="form_ajax_redir_2" method="post">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
 </form>

 <script language="javascript" src="prototype.js" type="text/javascript"></script>
 <script language="javascript" src="scriptaculous.js" type="text/javascript"></script>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug()
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormDataOdd\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay(sErrorId)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
    }
    if (document.getElementById("id_error_display_fixed"))
    {
      document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay

  function scAjaxShowErrorDisplay(sErrorId, sErrorMsg)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "')", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
    else if ("table" == sErrorId)
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.left = posDispLeft + "px";
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.top = posDispTop + "px";
    }
  } // scAjaxShowErrorDisplay

  function scAjaxHideMessage()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    if ("" == oResp["msgDisplay"]["msgText"])
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
    else
    {
      document.getElementById("id_message_display_frame").style.display = "";
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(oResp["msgDisplay"]["msgText"]);
    }
  } // scAjaxShowMessage

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_app_Participantes" == sTestField)
        {
          ajax_error_geral = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
    ajax_error_list[sField][sType] = aFieldErrors;
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
      {
        if (bLabel)
        {
          sErrorText += ajax_error_list[sField]["label"] + ": ";
        }
        sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons)
  {
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(oFieldValues[0]['value']);
        Temp_text = scAjaxProtectBreakLine(oFieldValues[0]['value']);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]['value']));
    }
  } // scAjaxSetFieldText

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues);
      return;
    }
    if (null != oFieldOptions)
    {
      document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField.options[iFieldSelect].value, aValues))
      {
        oFormField.options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField.options[iFieldSelect].selected = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];
    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml)
  {
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
      scAjaxClearCheckbox(sFieldName);
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp)
  {
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
      scAjaxClearRadio(sFieldName);
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp);
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
  } // scAjaxSetFieldRadio

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    sFieldLabel = oFieldValues[0]["value"];
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    if (document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = sImgFile;
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = sImgLink;
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if (document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = sDocLink;
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = sDocIcon;
    }
    document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = tinyMCE.getInstanceById(sFieldName);
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = sImgHtml;
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sReadLabel));
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    return document.F1.elements[sFieldName].value;
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    return document.F1.elements[sFieldName].value;
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return oFormField.options[iSelected].value;
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += oFormField[iFieldSelect].value;
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += aValues[iFieldCheck];
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (oFormField[iFieldRadio].checked)
      {
        sValue = oFormField[iFieldRadio].value;
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = tinyMCE.getInstanceById(sFieldName);
    return oFormField.getContent();
  } // scAjaxGetFieldEditorHtml

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
    var div = document.createElement('div');
    div.innerHTML = sParseString;
    return div.childNodes[0] ? div.childNodes[0].nodeValue : '';
  } // scAjaxSpecCharParser

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
        sDivText += "<input type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + ">";
        sDivText += sOptText;
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
  } // scAjaxRecreateOptions

  function scAjaxProcOn()
  {
    if (document.getElementById("id_div_process"))
    {
      document.getElementById("id_div_process").style.display = "";
    }
  } // scAjaxProcOn

  function scAjaxProcOff()
  {
    if (document.getElementById("id_div_process"))
    {
      document.getElementById("id_div_process").style.display = "none";
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"])
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        document.F1.elements[sFieldName].focus();
    }
  } // scAjaxSetFocus

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxRedir(oXml)
  {
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
          }
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
  } // scAjaxSetDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    sStyle = ("off" == sAction) ? "none" : "";
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {
      document.getElementById(sElement).style.display = sStyle;
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], oResp["fieldLabel"][iLabel][1]);
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField) && document.getElementById("id_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("id_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = '" + oResp["btnVars"][iBtn][1] + "';");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    var oFormField = tinyMCE.getInstanceById(sFormField);
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine


  // ---------- Validate id_grupo
  function do_ajax_app_Participantes_validate_id_grupo()
  {
  } // do_ajax_app_Participantes_validate_id_grupo

  function do_ajax_app_Participantes_validate_id_grupo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "id_grupo";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_id_grupo_cb

  // ---------- Validate nome
  function do_ajax_app_Participantes_validate_nome()
  {
    var nomeCampo_nome = "nome";
    var var_nome = scAjaxGetFieldText(nomeCampo_nome);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_nome(var_nome, var_script_case_init, do_ajax_app_Participantes_validate_nome_cb);
  } // do_ajax_app_Participantes_validate_nome

  function do_ajax_app_Participantes_validate_nome_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "nome";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_nome_cb

  // ---------- Validate sobrenome
  function do_ajax_app_Participantes_validate_sobrenome()
  {
    var nomeCampo_sobrenome = "sobrenome";
    var var_sobrenome = scAjaxGetFieldText(nomeCampo_sobrenome);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_sobrenome(var_sobrenome, var_script_case_init, do_ajax_app_Participantes_validate_sobrenome_cb);
  } // do_ajax_app_Participantes_validate_sobrenome

  function do_ajax_app_Participantes_validate_sobrenome_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "sobrenome";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_sobrenome_cb

  // ---------- Validate cep
  function do_ajax_app_Participantes_validate_cep()
  {
    var nomeCampo_cep = "cep";
    var var_cep = scAjaxGetFieldText(nomeCampo_cep);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_cep(var_cep, var_script_case_init, do_ajax_app_Participantes_validate_cep_cb);
  } // do_ajax_app_Participantes_validate_cep

  function do_ajax_app_Participantes_validate_cep_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "cep";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_cep_cb

  // ---------- Validate estado
  function do_ajax_app_Participantes_validate_estado()
  {
    var nomeCampo_estado = "estado";
    var var_estado = scAjaxGetFieldText(nomeCampo_estado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_estado(var_estado, var_script_case_init, do_ajax_app_Participantes_validate_estado_cb);
  } // do_ajax_app_Participantes_validate_estado

  function do_ajax_app_Participantes_validate_estado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "estado";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_estado_cb

  // ---------- Validate cidade
  function do_ajax_app_Participantes_validate_cidade()
  {
    var nomeCampo_cidade = "cidade";
    var var_cidade = scAjaxGetFieldText(nomeCampo_cidade);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_cidade(var_cidade, var_script_case_init, do_ajax_app_Participantes_validate_cidade_cb);
  } // do_ajax_app_Participantes_validate_cidade

  function do_ajax_app_Participantes_validate_cidade_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "cidade";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_cidade_cb

  // ---------- Validate bairro
  function do_ajax_app_Participantes_validate_bairro()
  {
    var nomeCampo_bairro = "bairro";
    var var_bairro = scAjaxGetFieldText(nomeCampo_bairro);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_bairro(var_bairro, var_script_case_init, do_ajax_app_Participantes_validate_bairro_cb);
  } // do_ajax_app_Participantes_validate_bairro

  function do_ajax_app_Participantes_validate_bairro_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "bairro";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_bairro_cb

  // ---------- Validate logradouro
  function do_ajax_app_Participantes_validate_logradouro()
  {
    var nomeCampo_logradouro = "logradouro";
    var var_logradouro = scAjaxGetFieldText(nomeCampo_logradouro);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_logradouro(var_logradouro, var_script_case_init, do_ajax_app_Participantes_validate_logradouro_cb);
  } // do_ajax_app_Participantes_validate_logradouro

  function do_ajax_app_Participantes_validate_logradouro_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "logradouro";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_logradouro_cb

  // ---------- Validate numero
  function do_ajax_app_Participantes_validate_numero()
  {
    var nomeCampo_numero = "numero";
    var var_numero = scAjaxGetFieldText(nomeCampo_numero);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_numero(var_numero, var_script_case_init, do_ajax_app_Participantes_validate_numero_cb);
  } // do_ajax_app_Participantes_validate_numero

  function do_ajax_app_Participantes_validate_numero_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "numero";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_numero_cb

  // ---------- Validate complemento
  function do_ajax_app_Participantes_validate_complemento()
  {
    var nomeCampo_complemento = "complemento";
    var var_complemento = scAjaxGetFieldText(nomeCampo_complemento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_complemento(var_complemento, var_script_case_init, do_ajax_app_Participantes_validate_complemento_cb);
  } // do_ajax_app_Participantes_validate_complemento

  function do_ajax_app_Participantes_validate_complemento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "complemento";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_complemento_cb

  // ---------- Validate email
  function do_ajax_app_Participantes_validate_email()
  {
    var nomeCampo_email = "email";
    var var_email = scAjaxGetFieldText(nomeCampo_email);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_email(var_email, var_script_case_init, do_ajax_app_Participantes_validate_email_cb);
  } // do_ajax_app_Participantes_validate_email

  function do_ajax_app_Participantes_validate_email_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "email";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_email_cb

  // ---------- Validate telefax
  function do_ajax_app_Participantes_validate_telefax()
  {
    var nomeCampo_telefax = "telefax";
    var var_telefax = scAjaxGetFieldText(nomeCampo_telefax);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_telefax(var_telefax, var_script_case_init, do_ajax_app_Participantes_validate_telefax_cb);
  } // do_ajax_app_Participantes_validate_telefax

  function do_ajax_app_Participantes_validate_telefax_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "telefax";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_telefax_cb

  // ---------- Validate tel
  function do_ajax_app_Participantes_validate_tel()
  {
    var nomeCampo_tel = "tel";
    var var_tel = scAjaxGetFieldText(nomeCampo_tel);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_tel(var_tel, var_script_case_init, do_ajax_app_Participantes_validate_tel_cb);
  } // do_ajax_app_Participantes_validate_tel

  function do_ajax_app_Participantes_validate_tel_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "tel";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_tel_cb

  // ---------- Validate obs
  function do_ajax_app_Participantes_validate_obs()
  {
    var nomeCampo_obs = "obs";
    var var_obs = scAjaxGetFieldText(nomeCampo_obs);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Participantes_validate_obs(var_obs, var_script_case_init, do_ajax_app_Participantes_validate_obs_cb);
  } // do_ajax_app_Participantes_validate_obs

  function do_ajax_app_Participantes_validate_obs_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    sFieldValid = "obs";
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Participantes_validate_obs_cb
  // ---------- Form
  function do_ajax_app_Participantes_submit_form()
  {
    scAjaxHideMessage();
    var var_id_grupo = scAjaxGetFieldText("id_grupo");
    var var_nome = scAjaxGetFieldText("nome");
    var var_sobrenome = scAjaxGetFieldText("sobrenome");
    var var_cep = scAjaxGetFieldText("cep");
    var var_estado = scAjaxGetFieldText("estado");
    var var_cidade = scAjaxGetFieldText("cidade");
    var var_bairro = scAjaxGetFieldText("bairro");
    var var_logradouro = scAjaxGetFieldText("logradouro");
    var var_numero = scAjaxGetFieldText("numero");
    var var_complemento = scAjaxGetFieldText("complemento");
    var var_email = scAjaxGetFieldText("email");
    var var_telefax = scAjaxGetFieldText("telefax");
    var var_tel = scAjaxGetFieldText("tel");
    var var_obs = scAjaxGetFieldText("obs");
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    scAjaxProcOn();
    x_ajax_app_Participantes_submit_form(var_id_grupo, var_nome, var_sobrenome, var_cep, var_estado, var_cidade, var_bairro, var_logradouro, var_numero, var_complemento, var_email, var_telefax, var_tel, var_obs, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, do_ajax_app_Participantes_submit_form_cb);
  } // do_ajax_app_Participantes_submit_form

  function do_ajax_app_Participantes_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk())
    {
      scAjaxShowMessage();
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("id_grupo");
      scAjaxHideErrorDisplay("nome");
      scAjaxHideErrorDisplay("sobrenome");
      scAjaxHideErrorDisplay("cep");
      scAjaxHideErrorDisplay("estado");
      scAjaxHideErrorDisplay("cidade");
      scAjaxHideErrorDisplay("bairro");
      scAjaxHideErrorDisplay("logradouro");
      scAjaxHideErrorDisplay("numero");
      scAjaxHideErrorDisplay("complemento");
      scAjaxHideErrorDisplay("email");
      scAjaxHideErrorDisplay("telefax");
      scAjaxHideErrorDisplay("tel");
      scAjaxHideErrorDisplay("obs");
      scLigEditLookupCall();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxSetMaster();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_app_Participantes_submit_form_cb

  var scStatusDetail = {};

  function do_ajax_app_Participantes_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("id_grupo");
    scAjaxHideErrorDisplay("nome");
    scAjaxHideErrorDisplay("sobrenome");
    scAjaxHideErrorDisplay("cep");
    scAjaxHideErrorDisplay("estado");
    scAjaxHideErrorDisplay("cidade");
    scAjaxHideErrorDisplay("bairro");
    scAjaxHideErrorDisplay("logradouro");
    scAjaxHideErrorDisplay("numero");
    scAjaxHideErrorDisplay("complemento");
    scAjaxHideErrorDisplay("email");
    scAjaxHideErrorDisplay("telefax");
    scAjaxHideErrorDisplay("tel");
    scAjaxHideErrorDisplay("obs");
    var var_id_participe = document.F2.id_participe.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_app_Participantes_navigate_form(var_id_participe, var_nm_form_submit, var_nmgp_opcao, var_script_case_init, do_ajax_app_Participantes_navigate_form_cb);
  } // do_ajax_app_Participantes_navigate_form

  function do_ajax_app_Participantes_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
    document.F2.id_participe.value = scAjaxGetKeyValue("id_participe");
    scAjaxShowDebug();
    scAjaxSetDisplay(true);
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetFocus();
    scAjaxSetNavStatus("t");
    scAjaxSetBtnVars();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_app_Participantes_restore_buttons();
<?php
}
?>
  } // do_ajax_app_Participantes_navigate_form_cb

  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "id_grupo";
  ajax_field_list[1] = "nome";
  ajax_field_list[2] = "sobrenome";
  ajax_field_list[3] = "cep";
  ajax_field_list[4] = "estado";
  ajax_field_list[5] = "cidade";
  ajax_field_list[6] = "bairro";
  ajax_field_list[7] = "logradouro";
  ajax_field_list[8] = "numero";
  ajax_field_list[9] = "complemento";
  ajax_field_list[10] = "email";
  ajax_field_list[11] = "telefax";
  ajax_field_list[12] = "tel";
  ajax_field_list[13] = "obs";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {
    "id_grupo": {"label": "Grupo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nome": {"label": "Nome Participante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sobrenome": {"label": "Sobrenome", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cep": {"label": "CEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estado": {"label": "Estado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cidade": {"label": "Cidade", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "bairro": {"label": "Bairro", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "logradouro": {"label": "Endere�o", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "numero": {"label": "N�mero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "complemento": {"label": "Complemento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "email": {"label": "E-mail", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefax": {"label": "Telefone / Fax", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tel": {"label": "Celular", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "obs": {"label": "Observa��es", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "id_grupo": new Array(),
    "nome": new Array(),
    "sobrenome": new Array(),
    "cep": new Array(),
    "estado": new Array(),
    "cidade": new Array(),
    "bairro": new Array(),
    "logradouro": new Array(),
    "numero": new Array(),
    "complemento": new Array(),
    "email": new Array(),
    "telefax": new Array(),
    "tel": new Array(),
    "obs": new Array()
  };
  ajax_field_mult["id_grupo"][1] = "id_grupo";
  ajax_field_mult["nome"][1] = "nome";
  ajax_field_mult["sobrenome"][1] = "sobrenome";
  ajax_field_mult["cep"][1] = "cep";
  ajax_field_mult["estado"][1] = "estado";
  ajax_field_mult["cidade"][1] = "cidade";
  ajax_field_mult["bairro"][1] = "bairro";
  ajax_field_mult["logradouro"][1] = "logradouro";
  ajax_field_mult["numero"][1] = "numero";
  ajax_field_mult["complemento"][1] = "complemento";
  ajax_field_mult["email"][1] = "email";
  ajax_field_mult["telefax"][1] = "telefax";
  ajax_field_mult["tel"][1] = "tel";
  ajax_field_mult["obs"][1] = "obs";

  var ajax_field_id = {
    "id_grupo": new Array("hidden_field_label_id_grupo", "hidden_field_data_id_grupo"),
    "nome": new Array("hidden_field_label_nome", "hidden_field_data_nome"),
    "sobrenome": new Array("hidden_field_label_sobrenome", "hidden_field_data_sobrenome"),
    "cep": new Array("hidden_field_label_cep", "hidden_field_data_cep"),
    "estado": new Array("hidden_field_label_estado", "hidden_field_data_estado"),
    "cidade": new Array("hidden_field_label_cidade", "hidden_field_data_cidade"),
    "bairro": new Array("hidden_field_label_bairro", "hidden_field_data_bairro"),
    "logradouro": new Array("hidden_field_label_logradouro", "hidden_field_data_logradouro"),
    "numero": new Array("hidden_field_label_numero", "hidden_field_data_numero"),
    "complemento": new Array("hidden_field_label_complemento", "hidden_field_data_complemento"),
    "email": new Array("hidden_field_label_email", "hidden_field_data_email"),
    "telefax": new Array("hidden_field_label_telefax", "hidden_field_data_telefax"),
    "tel": new Array("hidden_field_label_tel", "hidden_field_data_tel"),
    "obs": new Array("hidden_field_label_obs", "hidden_field_data_obs")
  };

  var ajax_read_only = {
    "id_grupo": "off",
    "nome": "off",
    "sobrenome": "off",
    "cep": "off",
    "estado": "off",
    "cidade": "off",
    "bairro": "off",
    "logradouro": "off",
    "numero": "off",
    "complemento": "off",
    "email": "off",
    "telefax": "off",
    "tel": "off",
    "obs": "off"
  };
  var bRefreshTable = false;
  function scRefreshTable()
  {
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("id_grupo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("nome" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("sobrenome" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("cep" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("estado" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("cidade" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("bairro" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("logradouro" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("numero" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("complemento" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("email" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("telefax" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("tel" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("obs" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>

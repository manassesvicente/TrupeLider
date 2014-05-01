
 <form name="form_ajax_redir_1" method="post">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
 </form>
 <form name="form_ajax_redir_2" method="post">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
 </form>

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
        if ("geral_app_Habilidades" == sTestField)
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


  // ---------- Validate id_competencia
  function do_ajax_app_Habilidades_validate_id_competencia(iNumLinha)
  {
    var nomeCampo_id_competencia = "id_competencia" + iNumLinha;
    var var_id_competencia = scAjaxGetFieldSelect(nomeCampo_id_competencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Habilidades_validate_id_competencia(var_id_competencia, iNumLinha, var_script_case_init, do_ajax_app_Habilidades_validate_id_competencia_cb);
  } // do_ajax_app_Habilidades_validate_id_competencia

  function do_ajax_app_Habilidades_validate_id_competencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "id_competencia" + iLineNumber;
    }
    else
    {
      sFieldValid = "id_competencia";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "id_competencia");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "id_competencia");
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Habilidades_validate_id_competencia_cb

  // ---------- Validate cod_habilidade
  function do_ajax_app_Habilidades_validate_cod_habilidade(iNumLinha)
  {
    var nomeCampo_cod_habilidade = "cod_habilidade" + iNumLinha;
    var var_cod_habilidade = scAjaxGetFieldText(nomeCampo_cod_habilidade);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Habilidades_validate_cod_habilidade(var_cod_habilidade, iNumLinha, var_script_case_init, do_ajax_app_Habilidades_validate_cod_habilidade_cb);
  } // do_ajax_app_Habilidades_validate_cod_habilidade

  function do_ajax_app_Habilidades_validate_cod_habilidade_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "cod_habilidade" + iLineNumber;
    }
    else
    {
      sFieldValid = "cod_habilidade";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "cod_habilidade");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "cod_habilidade");
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Habilidades_validate_cod_habilidade_cb

  // ---------- Validate peso
  function do_ajax_app_Habilidades_validate_peso(iNumLinha)
  {
    var nomeCampo_peso = "peso" + iNumLinha;
    var var_peso = scAjaxGetFieldText(nomeCampo_peso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Habilidades_validate_peso(var_peso, iNumLinha, var_script_case_init, do_ajax_app_Habilidades_validate_peso_cb);
  } // do_ajax_app_Habilidades_validate_peso

  function do_ajax_app_Habilidades_validate_peso_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "peso" + iLineNumber;
    }
    else
    {
      sFieldValid = "peso";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "peso");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "peso");
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Habilidades_validate_peso_cb

  // ---------- Validate descricao
  function do_ajax_app_Habilidades_validate_descricao(iNumLinha)
  {
    var nomeCampo_descricao = "descricao" + iNumLinha;
    var var_descricao = scAjaxGetFieldText(nomeCampo_descricao);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Habilidades_validate_descricao(var_descricao, iNumLinha, var_script_case_init, do_ajax_app_Habilidades_validate_descricao_cb);
  } // do_ajax_app_Habilidades_validate_descricao

  function do_ajax_app_Habilidades_validate_descricao_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "descricao" + iLineNumber;
    }
    else
    {
      sFieldValid = "descricao";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "descricao");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "descricao");
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Habilidades_validate_descricao_cb

  // ---------- Validate obs
  function do_ajax_app_Habilidades_validate_obs(iNumLinha)
  {
    var nomeCampo_obs = "obs" + iNumLinha;
    var var_obs = scAjaxGetFieldText(nomeCampo_obs);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Habilidades_validate_obs(var_obs, iNumLinha, var_script_case_init, do_ajax_app_Habilidades_validate_obs_cb);
  } // do_ajax_app_Habilidades_validate_obs

  function do_ajax_app_Habilidades_validate_obs_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    iLineNumber = scAjaxGetLineNumber();
    if ("" != iLineNumber)
    {
      sFieldValid = "obs" + iLineNumber;
    }
    else
    {
      sFieldValid = "obs";
    }
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      scAjaxHideErrorDisplay(sFieldValid);
      scErrorLineOff(iLineNumber, "obs");
    }
    else
    {
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
      scErrorLineOn(iLineNumber, "obs");
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_app_Habilidades_validate_obs_cb

  var sc_num_ult_line = "";
  var sc_insert_open  = false;

  // ---------- add_new_line
  function do_ajax_app_Habilidades_add_new_line()
  {
    if (sc_insert_open)
    {
      return;
    }
    sc_insert_open = true;
    scDisableNavigation();
    sc_num_ult_line = iAjaxNewLine + 1;
    var var_sc_seq_vert = document.F1.sc_contr_vert.value;
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Habilidades_add_new_line(var_sc_seq_vert, var_script_case_init, do_ajax_app_Habilidades_add_new_line_cb);
  } // do_ajax_app_Habilidades_add_new_line

  function do_ajax_app_Habilidades_add_new_line_cb(sResp)
  {
    document.getElementById("new_line_dummy").innerHTML = "<table id=\"new_line_table\">" + scAjaxSpecCharParser(sResp) + "</table>";
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTBodyNew = document.getElementById("new_line_table").tBodies[0];
    var oTRNewLine = oTBodyNew.rows[0];
    oTBodyOld.appendChild(oTRNewLine);
    ajax_create_tables(document.F1.sc_contr_vert.value);
    iAjaxNewLine = document.F1.sc_contr_vert.value;
    document.F1.sc_contr_vert.value++;
  } // do_ajax_app_Habilidades_add_new_line_cb

  // ---------- backup_line
  function do_ajax_app_Habilidades_backup_line(iNumLinha)
  {
    var var_id_habilidade = scAjaxGetFieldText("id_habilidade" + iNumLinha);
    var var_nmgp_refresh_row = iNumLinha;
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_app_Habilidades_backup_line(var_id_habilidade, var_nmgp_refresh_row, var_nm_form_submit, var_script_case_init, do_ajax_app_Habilidades_backup_line_cb);
  } // do_ajax_app_Habilidades_backup_line

  function do_ajax_app_Habilidades_backup_line_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    if (!scAjaxHasError())
    {
      scAjaxSetFields();
    }
  } // do_ajax_app_Habilidades_backup_line_cb

  function do_ajax_app_Habilidades_cancel_insert()
  {
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    var oTROldLine = oTBodyOld.rows[oTBodyOld.rows.length - 1];
    oTBodyOld.removeChild(oTROldLine);
    scEnableNavigation();
    sc_insert_open = false;
    scAjaxHideErrorDisplay("table");
  } // do_ajax_app_Habilidades_cancel_insert

  function do_ajax_app_Habilidades_cancel_update(iSeqVert)
  {
    do_ajax_app_Habilidades_backup_line(iSeqVert);
    scErrorLineOff(iSeqVert, "__sc_all__");
    scAjaxHideErrorDisplay("table");
<?php
    if ($this->Embutida_ronly)
    {
?>
    mdCloseObjects(iSeqVert);
    if (document.getElementById("sc_exc_line_" + iSeqVert))
      document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_open_line_" + iSeqVert))
      document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
    if (document.getElementById("sc_upd_line_" + iSeqVert))
      document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
    if (document.getElementById("sc_cancelu_line_" + iSeqVert))
      document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
<?php
    }
?>
  } // do_ajax_app_Habilidades_cancel_update

  function do_ajax_app_Habilidades_restore_buttons()
  {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
?>
    for (iSeqVert = 1; iSeqVert <= <?php echo $this->sc_max_reg; ?>; iSeqVert++)
    {
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
      if (document.getElementById("sc_exc_line_" + iSeqVert))
        document.getElementById("sc_exc_line_" + iSeqVert).style.display = "";
<?php
    }
?>
      if (document.getElementById("sc_open_line_" + iSeqVert))
        document.getElementById("sc_open_line_" + iSeqVert).style.display = "";
      if (document.getElementById("sc_ins_line_" + iSeqVert))
        document.getElementById("sc_ins_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_upd_line_" + iSeqVert))
        document.getElementById("sc_upd_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_new_line_" + iSeqVert))
        document.getElementById("sc_new_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_canceli_line_" + iSeqVert))
        document.getElementById("sc_canceli_line_" + iSeqVert).style.display = "none";
      if (document.getElementById("sc_cancelu_line_" + iSeqVert))
        document.getElementById("sc_cancelu_line_" + iSeqVert).style.display = "none";
    }
<?php
    }
?>
  } // do_ajax_app_Habilidades_restore_buttons

  // ---------- table_refresh
  function do_ajax_app_Habilidades_table_refresh()
  {
    var var_id_habilidade = document.F2.id_habilidade.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_app_Habilidades_table_refresh(var_id_habilidade, var_nm_form_submit, var_nmgp_opcao, var_script_case_init, do_ajax_app_Habilidades_table_refresh_cb);
  } //  do_ajax_app_Habilidades_table_refresh

  function do_ajax_app_Habilidades_table_refresh_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    if (oResp["rsSize"] < <?php echo $this->sc_max_reg; ?>)
    {
       bRefreshTable = true;
    }
    document.F2.id_habilidade.value = scAjaxGetKeyValue("id_habilidade");
    document.getElementById("SC_tab_mult_reg").innerHTML = scAjaxSpecCharParser(oResp["tableRefresh"]);
    document.F1.sc_contr_vert.value = <?php echo $this->sc_max_reg + 1; ?>;
    iAjaxNewLine = oResp["rsSize"];
    scAjaxSetNavStatus("t");
  } // do_ajax_app_Habilidades_table_refresh_cb

  // ---------- Form
  var sc_num_ult_line = "";
  var sc_num_ult_opc  = "";
  var sc_num_ult_tr   = "";
  function do_ajax_app_Habilidades_submit_form(iNumLinha, indexTR)
  {
    sc_num_ult_line = iNumLinha;
    sc_num_ult_tr   = indexTR;
    scAjaxHideMessage();
    var var_id_competencia = scAjaxGetFieldSelect("id_competencia" + iNumLinha);
    var var_cod_habilidade = scAjaxGetFieldText("cod_habilidade" + iNumLinha);
    var var_peso = scAjaxGetFieldText("peso" + iNumLinha);
    var var_descricao = scAjaxGetFieldText("descricao" + iNumLinha);
    var var_obs = scAjaxGetFieldText("obs" + iNumLinha);
    var var_id_habilidade = scAjaxGetFieldText("id_habilidade" + iNumLinha);
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    var var_nmgp_refresh_row = iNumLinha;
<?php
    }
    else
    {
?>
    var var_nmgp_refresh_row = "";
<?php
    }
?>
    sc_num_ult_opc = var_nmgp_opcao;
    scAjaxProcOn();
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
    scRemoveErrors();
<?php
    }
?>
    x_ajax_app_Habilidades_submit_form(var_id_competencia, var_cod_habilidade, var_peso, var_descricao, var_obs, var_id_habilidade, var_nmgp_refresh_row, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, do_ajax_app_Habilidades_submit_form_cb);
  } // do_ajax_app_Habilidades_submit_form

  function do_ajax_app_Habilidades_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      scAjaxHideErrorDisplay("table");
      scErrorLineOff(sc_num_ult_line, "__sc_all__");
    }
    else
    {
      scAjaxShowErrorDisplay("table", sAppErrors);
      scErrorLineOn(sc_num_ult_line, "__sc_all__");
    }
    if (!scAjaxHasError())
    {
      if (sc_num_ult_opc == 'incluir')
      {
         bRefreshTable = true;
         if (document.getElementById("sc_ins_line_" + sc_num_ult_line))
           document.getElementById("sc_ins_line_" + sc_num_ult_line).style.display = "none";
         if (document.getElementById("sc_upd_line_" + sc_num_ult_line))
           document.getElementById("sc_upd_line_" + sc_num_ult_line).style.display = "";
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
    }
?>
         if (document.getElementById("sc_new_line_" + sc_num_ult_line))
           document.getElementById("sc_new_line_" + sc_num_ult_line).style.display = "none";
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
         if (document.getElementById("sc_canceli_line_" + sc_num_ult_line))
           document.getElementById("sc_canceli_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
         sc_insert_open = false;
         scEnableNavigation();
      }
      if (sc_num_ult_opc == 'alterar')
      {
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
    {
       if ($this->nmgp_botoes['delete'] == 'on')
       {
?>
         if (document.getElementById("sc_exc_line_" + sc_num_ult_line))
           document.getElementById("sc_exc_line_" + sc_num_ult_line).style.display = "";
<?php
       }
?>
         if (document.getElementById("sc_cancelu_line_" + sc_num_ult_line))
           document.getElementById("sc_cancelu_line_" + sc_num_ult_line).style.display = "none";
<?php
    }
?>
      }
      if (sc_num_ult_opc == 'excluir')
      {
         bRefreshTable = true;
         sc_name_table = document.getElementById("hidden_bloco_0");
         sc_name_table.deleteRow(sc_num_ult_tr);
         sc_num_ult_line = sc_name_table.rows.length - 1;
      }
      if (sc_num_ult_opc == 'alterar')
      {
<?php
    if (isset($this->Embutida_form) && $this->Embutida_form)
    {
?>
<?php
    }
?>
      }
      scAjaxShowMessage();
      scAjaxHideErrorDisplay("table");
      scAjaxHideErrorDisplay("id_competencia" + sc_num_ult_line);
      scAjaxHideErrorDisplay("cod_habilidade" + sc_num_ult_line);
      scAjaxHideErrorDisplay("peso" + sc_num_ult_line);
      scAjaxHideErrorDisplay("descricao" + sc_num_ult_line);
      scAjaxHideErrorDisplay("obs" + sc_num_ult_line);
<?php
if (isset($this->Embutida_form) && $this->Embutida_form) {
?>
      scAjaxSetFields();
      scAjaxSetReadonly();
<?php
    if (isset($this->Embutida_ronly) && $this->Embutida_ronly) {
?>
      mdCloseLine();
<?php
    }
} else {
?>
      scAjaxSetReadonly(true);
<?php
}
?>
      scLigEditLookupCall();
    }
    scAjaxShowDebug();
    scAjaxSetDisplay(true);
    scAjaxSetLabel(true);
    scAjaxSetMaster();
    scAjaxSetFocus();
    scAjaxRedir();
  } // do_ajax_app_Habilidades_submit_form_cb

  var scStatusDetail = {};

  function do_ajax_app_Habilidades_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    nm_uncheck_delete();
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    for (iNavForm = 1; iNavForm < <?php echo $this->sc_max_reg; ?> + 1; iNavForm++)
    {
      scAjaxHideErrorDisplay("id_competencia" + iNavForm);
      scAjaxHideErrorDisplay("cod_habilidade" + iNavForm);
      scAjaxHideErrorDisplay("peso" + iNavForm);
      scAjaxHideErrorDisplay("descricao" + iNavForm);
      scAjaxHideErrorDisplay("obs" + iNavForm);
    }
    var var_id_habilidade = document.F2.id_habilidade.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_app_Habilidades_navigate_form(var_id_habilidade, var_nm_form_submit, var_nmgp_opcao, var_script_case_init, do_ajax_app_Habilidades_navigate_form_cb);
  } // do_ajax_app_Habilidades_navigate_form

  function do_ajax_app_Habilidades_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    var var_last_index = oResp["rsSize"];
    scAjaxSetFields();
    document.F2.id_habilidade.value = scAjaxGetKeyValue("id_habilidade" + var_last_index);
    var_last_index = parseInt(var_last_index) + 1;
    for (iNavigateForm = 1; iNavigateForm < var_last_index; iNavigateForm++)
    {
      if (document.getElementById("idVertRow" + iNavigateForm))
      {
        document.getElementById("idVertRow" + iNavigateForm).style.display = "";
      }
    }
    var oTBodyOld = document.getElementById("hidden_bloco_0").tBodies[0];
    for (iNavigatedel = <?php echo $this->sc_max_reg; ?>; iNavigatedel >= iNavigateForm; iNavigatedel--)
    {
        oTBodyOld.deleteRow(iNavigatedel);
        bRefreshTable = true;
    }
    document.F1.sc_contr_vert.value = var_last_index;
    scAjaxShowDebug();
    scAjaxSetDisplay(true);
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetFocus();
    scAjaxSetNavStatus("t");
    scAjaxSetBtnVars();
    scErrorLineReset();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_app_Habilidades_restore_buttons();
<?php
}
?>
  } // do_ajax_app_Habilidades_navigate_form_cb

  function do_ajax_app_Habilidades_lkpedt_refresh_id_competencia(iSeq)
  {
    var var_script_case_init = document.F1.script_case_init.value;
    var nmgp_refresh_row = iSeq;
    var nmgp_refresh_fields = "id_competencia";
    x_ajax_app_Habilidades_lkpedt_refresh_id_competencia(nmgp_refresh_row, nmgp_refresh_fields, var_script_case_init, do_ajax_app_Habilidades_lkpedt_refresh_id_competencia_cb);
  } // do_ajax_app_Habilidades_lkpedt_refresh_id_competencia

  function do_ajax_app_Habilidades_lkpedt_refresh_id_competencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxSetFields();
  } // do_ajax_app_Habilidades_lkpedt_refresh_id_competencia_cb

  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc

<?php
$sLineInfo = $this->Embutida_form ? '' : ' (linha " + iNumLinha + ")';
?>
  function ajax_create_tables(iNumLinha)
  {
    ajax_field_list[iTotCampos] = "id_competencia" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "cod_habilidade" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "peso" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "descricao" + iNumLinha;
    iTotCampos++;
    ajax_field_list[iTotCampos] = "obs" + iNumLinha;
    iTotCampos++;
    ajax_error_list["id_competencia" + iNumLinha] = {"label": "Competência<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["cod_habilidade" + iNumLinha] = {"label": "Código da Habilidade<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["peso" + iNumLinha] = {"label": "PESO<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["descricao" + iNumLinha] = {"label": "Descrição da Habilidade<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_error_list["obs" + iNumLinha] = {"label": "Sobre a Habilidade<?php echo $sLineInfo; ?>", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5};
    ajax_field_mult["id_competencia"][iNumLinha] = "id_competencia" + iNumLinha;
    ajax_field_mult["cod_habilidade"][iNumLinha] = "cod_habilidade" + iNumLinha;
    ajax_field_mult["peso"][iNumLinha] = "peso" + iNumLinha;
    ajax_field_mult["descricao"][iNumLinha] = "descricao" + iNumLinha;
    ajax_field_mult["obs"][iNumLinha] = "obs" + iNumLinha;
    ajax_field_id["id_competencia" + iNumLinha] = new Array("hidden_field_label_id_competencia", "hidden_field_data_id_competencia" + iNumLinha);
    ajax_field_id["cod_habilidade" + iNumLinha] = new Array("hidden_field_label_cod_habilidade", "hidden_field_data_cod_habilidade" + iNumLinha);
    ajax_field_id["peso" + iNumLinha] = new Array("hidden_field_label_peso", "hidden_field_data_peso" + iNumLinha);
    ajax_field_id["descricao" + iNumLinha] = new Array("hidden_field_label_descricao", "hidden_field_data_descricao" + iNumLinha);
    ajax_field_id["obs" + iNumLinha] = new Array("hidden_field_label_obs", "hidden_field_data_obs" + iNumLinha);
    ajax_error_count["id_competencia" + iNumLinha] = "off";
    ajax_error_count["cod_habilidade" + iNumLinha] = "off";
    ajax_error_count["peso" + iNumLinha] = "off";
    ajax_error_count["descricao" + iNumLinha] = "off";
    ajax_error_count["obs" + iNumLinha] = "off";
<?php
if (!$this->Grid_editavel)
{
?>
    ajax_read_only["id_competencia" + iNumLinha] = "off";
    ajax_read_only["cod_habilidade" + iNumLinha] = "off";
    ajax_read_only["peso" + iNumLinha] = "off";
    ajax_read_only["descricao" + iNumLinha] = "off";
    ajax_read_only["obs" + iNumLinha] = "off";
<?php
}
else
{
?>
    ajax_read_only["id_competencia" + iNumLinha] = "on";
    ajax_read_only["cod_habilidade" + iNumLinha] = "on";
    ajax_read_only["peso" + iNumLinha] = "on";
    ajax_read_only["descricao" + iNumLinha] = "on";
    ajax_read_only["obs" + iNumLinha] = "on";
<?php
}
?>
  }

  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  iTotCampos = 0;
  iTotDt_Hr  = 0;

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {};
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "id_competencia": new Array(),
    "cod_habilidade": new Array(),
    "peso": new Array(),
    "descricao": new Array(),
    "obs": new Array()
  };

  var ajax_field_id = {};

  var ajax_read_only = {};

  var ajax_error_count = {};

  var Lim_linhas = <?php echo $sc_seq_vert ?>;
  for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
  {
     ajax_create_tables(iNumLinha);
  }

  function scRemoveErrors()
  {
    for (iNumLinha = 1; iNumLinha < Lim_linhas; iNumLinha++)
    {
      ajax_error_list["id_competencia" + iNumLinha]["valid"] = new Array();
      ajax_error_list["id_competencia" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["id_competencia" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["id_competencia" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["id_competencia" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["cod_habilidade" + iNumLinha]["valid"] = new Array();
      ajax_error_list["cod_habilidade" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["cod_habilidade" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["cod_habilidade" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["cod_habilidade" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["peso" + iNumLinha]["valid"] = new Array();
      ajax_error_list["peso" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["peso" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["peso" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["peso" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["descricao" + iNumLinha]["valid"] = new Array();
      ajax_error_list["descricao" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["descricao" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["descricao" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["descricao" + iNumLinha]["onfocus"] = new Array();
      ajax_error_list["obs" + iNumLinha]["valid"] = new Array();
      ajax_error_list["obs" + iNumLinha]["onblur"] = new Array();
      ajax_error_list["obs" + iNumLinha]["onchange"] = new Array();
      ajax_error_list["obs" + iNumLinha]["onclick"] = new Array();
      ajax_error_list["obs" + iNumLinha]["onfocus"] = new Array();
    }
  }

  function mdOpenLine(iSeq)
  {
    if (document.getElementById("sc_open_line_" + iSeq))
    {
      document.getElementById("sc_open_line_" + iSeq).style.display = "none";
    }
<?php
    if ($this->nmgp_botoes['delete'] == 'on')
    {
?>
    if (document.getElementById("sc_exc_line_" + iSeq))
    {
      document.getElementById("sc_exc_line_" + iSeq).style.display = "none";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + iSeq))
    {
      document.getElementById("sc_upd_line_" + iSeq).style.display = "";
    }
    if (document.getElementById("sc_cancelu_line_" + iSeq))
    {
      document.getElementById("sc_cancelu_line_" + iSeq).style.display = "";
    }
    mdOpenObjects(iSeq);
  }

  function mdOpenObjects(iSeq)
  {
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['id_competencia'])) ? $this->nmgp_cmp_readonly['id_competencia'] : 'off';
?>
    scAjaxFieldRead("id_competencia" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['cod_habilidade'])) ? $this->nmgp_cmp_readonly['cod_habilidade'] : 'off';
?>
    scAjaxFieldRead("cod_habilidade" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['peso'])) ? $this->nmgp_cmp_readonly['peso'] : 'off';
?>
    scAjaxFieldRead("peso" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['descricao'])) ? $this->nmgp_cmp_readonly['descricao'] : 'off';
?>
    scAjaxFieldRead("descricao" + iSeq, "<?php echo $NM_contr_readonly ?>");
<?php
  $NM_contr_readonly = (isset($this->nmgp_cmp_readonly['obs'])) ? $this->nmgp_cmp_readonly['obs'] : 'off';
?>
    scAjaxFieldRead("obs" + iSeq, "<?php echo $NM_contr_readonly ?>");
  }

  function mdCloseObjects(iSeq)
  {
    scAjaxFieldRead("id_competencia" + iSeq, "on");
    scAjaxFieldRead("cod_habilidade" + iSeq, "on");
    scAjaxFieldRead("peso" + iSeq, "on");
    scAjaxFieldRead("descricao" + iSeq, "on");
    scAjaxFieldRead("obs" + iSeq, "on");
  }

  function mdCloseLine()
  {
    if (!oResp["closeLine"] || "" == oResp["closeLine"])
    {
      return;
    }
<?php
    if ($this->nmgp_botoes['update'] == 'on')
    {
?>
    if (document.getElementById("sc_open_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_open_line_" + oResp["closeLine"]).style.display = "";
    }
<?php
    }
?>
    if (document.getElementById("sc_upd_line_" + oResp["closeLine"]))
    {
      document.getElementById("sc_upd_line_" + oResp["closeLine"]).style.display = "none";
    }
  }

  var sc_open_lines = 0;
  var orig_Nav_permite_ret = "";
  var orig_Nav_permite_ava = "";
  function scDisableNavigation()
  {
    if (0 == sc_open_lines)
    {
      orig_Nav_permite_ret = Nav_permite_ret;
      orig_Nav_permite_ava = Nav_permite_ava;
      Nav_permite_ret = "N";
      Nav_permite_ava = "N";
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
    }
    sc_open_lines++;
  }

  function scEnableNavigation()
  {
    sc_open_lines--;
    if (0 == sc_open_lines)
    {
      Nav_permite_ret = orig_Nav_permite_ret;
      Nav_permite_ava = orig_Nav_permite_ava;
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
    }
  }

  function scErrorLineOn(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "on";
    }
    if (bErrorRow || ("on" == ajax_error_count["id_competencia" + iRow] || "on" == ajax_error_count["cod_habilidade" + iRow] || "on" == ajax_error_count["peso" + iRow] || "on" == ajax_error_count["descricao" + iRow] || "on" == ajax_error_count["obs" + iRow]))
    {
      if (document.getElementById("hidden_field_data_sc_seq" + iRow))
        document.getElementById("hidden_field_data_sc_seq" + iRow).className = "scErrorLine";
      if (document.getElementById("hidden_field_data_sc_actions" + iRow))
        document.getElementById("hidden_field_data_sc_actions" + iRow).className = "scErrorLine";
      if (document.getElementById("hidden_field_data_id_competencia" + iRow))
        document.getElementById("hidden_field_data_id_competencia" + iRow).className = "scErrorLine";
      if (document.getElementById("hidden_field_data_cod_habilidade" + iRow))
        document.getElementById("hidden_field_data_cod_habilidade" + iRow).className = "scErrorLine";
      if (document.getElementById("hidden_field_data_peso" + iRow))
        document.getElementById("hidden_field_data_peso" + iRow).className = "scErrorLine";
      if (document.getElementById("hidden_field_data_descricao" + iRow))
        document.getElementById("hidden_field_data_descricao" + iRow).className = "scErrorLine";
      if (document.getElementById("hidden_field_data_obs" + iRow))
        document.getElementById("hidden_field_data_obs" + iRow).className = "scErrorLine";
    }
  }

  function scErrorLineOff(iRow, sIdError)
  {
    var bErrorRow = false;
    if ("__sc_all__" == sIdError)
    {
      bErrorRow = true;
    }
    else if (ajax_error_count[sIdError + iRow])
    {
      ajax_error_count[sIdError + iRow] = "off";
    }
    if (bErrorRow || ("off" == ajax_error_count["id_competencia" + iRow] && "off" == ajax_error_count["cod_habilidade" + iRow] && "off" == ajax_error_count["peso" + iRow] && "off" == ajax_error_count["descricao" + iRow] && "off" == ajax_error_count["obs" + iRow]))
    {
      if (bErrorRow)
      {
        ajax_error_count["id_competencia" + iRow] = "off";
        ajax_error_count["cod_habilidade" + iRow] = "off";
        ajax_error_count["peso" + iRow] = "off";
        ajax_error_count["descricao" + iRow] = "off";
        ajax_error_count["obs" + iRow] = "off";
      }
      var sCssLine = scErrorLineCss(iRow);
      if (document.getElementById("hidden_field_data_sc_seq" + iRow))
        document.getElementById("hidden_field_data_sc_seq" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_sc_actions" + iRow))
        document.getElementById("hidden_field_data_sc_actions" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_id_competencia" + iRow))
        document.getElementById("hidden_field_data_id_competencia" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_cod_habilidade" + iRow))
        document.getElementById("hidden_field_data_cod_habilidade" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_peso" + iRow))
        document.getElementById("hidden_field_data_peso" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_descricao" + iRow))
        document.getElementById("hidden_field_data_descricao" + iRow).className = sCssLine;
      if (document.getElementById("hidden_field_data_obs" + iRow))
        document.getElementById("hidden_field_data_obs" + iRow).className = sCssLine;
    }
  }

  function scErrorLineReset()
  {
    for (iLineReset = 0; iLineReset < iAjaxNewLine; iLineReset++)
    {
      scErrorLineOff(iLineReset, "__sc_all__");
    }
  }

  function scErrorLineCss(iRow)
  {
    return "scFormDataOdd";
  }
  var bRefreshTable = false;
  function scRefreshTable()
  {
    if (bRefreshTable)
    {
      do_ajax_app_Habilidades_table_refresh();
      bRefreshTable = false;
      return true;
    }
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("id_competencia" == sIndex)
    {
      scAjaxSetFieldSelect(sIndex, aValue, null);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("cod_habilidade" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("peso" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue);
      updateHeaderFooter(sIndex, aValue);
      return;
    }
    if ("descricao" == sIndex)
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

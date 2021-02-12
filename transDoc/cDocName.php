<!DOCTYPE html>
<HTML>
   <HEAD>
      <TITLE>SICON</TITLE>
   </HEAD>
   <BODY>
<form enctype="multipart/form-data" method="post" action="./Controller/transDocName.php"> 

	<select class="form-control custom-select border-dark" name="carpeta">
                                <option value=""></option>
                                <option value="DOCUMENTOS_MOV">DOCUMENTOS_MOV</option>
                                <option value="DOCUMENTOS_RES">DOCUMENTOS_RES</option>
                                <option value="DOCUMENTOS_PDC">DOCUMENTOS_PDC</option>
                                <option value="DOCUMENTOS_PDC">DOCUMENTOS_BAJAS</option>
                                <option value="DOCUMENTOS_PDC">DOCUMENTOS_SUPR</option>		
                            </select>

  <input type="text" class="form-control border-dark" id="doc" name="doc" placeholder="Ingresa el tipo de doc" maxlength="10"  required>
<br>
  <button type="submit" name="transform" class="btn btn-outline-info tamanio-button">Seguir</button> 
</form>

   </BODY>
</HTML>
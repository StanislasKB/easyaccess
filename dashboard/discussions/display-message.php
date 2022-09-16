<?php
require "../dashboard/database.php";
if(isset($_GET['id_d'],$_GET['id_e']) AND !empty($_GET['id_e']))
{
    $extentionsImage = array('jpg', 'jpeg' ,'gif' , 'png' , 'jfif');
    $extentionsVideo = array('mp4');
    $extentionsAudio = array('mp3','wav','aac');
    $messages=$db->prepare("SELECT * FROM messages,users WHERE messages.id_user=users.id_user AND messages.id_forum=? ORDER BY id_message ASC");
$messages->execute(array(htmlspecialchars($_GET['id_d'])));
$nbrM=$messages->rowCount();
if($nbrM>0)
{
  while($message=$messages->fetch())
  {
      if($message['id_user']==$_GET['id_e']){
        if(!is_null($message['contenu_message']) ){ 
        echo '<div class="message mt-3  d-flex justify-content-end" style="width:100%">
        <div class="message-right m-1 d-flex justify-content-end" style="width:90%">
            <div class="message-text p-3 bg-primary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
                <p class="">'.$message['contenu_message'].'</p>
                <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
            </div>
            <div class="image-user" style="width:10%">
                <div class="avatar avatar-online d-none d-md-block">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                </div>
            </div>
        </div>
    </div>';
    
        }
       if(!is_null($message['piece']) ){
        $extentionUpload= strtolower(substr(strrchr($message['piece'], '.'), 1));
        if(in_array($extentionUpload,$extentionsImage)){ 
     
        echo '<div class="message mt-3  d-flex justify-content-end" style="width:100%">
        <div class="message-right m-1 d-flex justify-content-end" style="width:90%">
            <div class="message-text p-3 bg-primary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
            <img class="w-100 img-fluid" src="../assets/imageMessage/'.$message['piece'].'" alt="">
                <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
            </div>
            <div class="image-user" style="width:10%">
                <div class="avatar avatar-online d-none d-md-block">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                </div>
            </div>
        </div>
    </div>';
    
        }else if(in_array($extentionUpload,$extentionsVideo)){
            echo '<div class="message-right mt-2 d-flex justify-content-end me-0">
            <div class="card message-box p-1 pb-0 text-white bg-kvv">
            <video class="w-100 h-100" src="../assets/imageMessage/'.$message['piece'].'"></video>
           
            </div>
            
        </div>';


        
        echo '<div class="message mt-3  d-flex justify-content-end" style="width:100%">
        <div class="message-right m-1 d-flex justify-content-end" style="width:90%">
            <div class="message-text p-3 bg-primary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
                <video class="w-100 h-100" src="../assets/imageMessage/'.$message['piece'].'"></video>
                <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
            </div>
            <div class="image-user" style="width:10%">
                <div class="avatar avatar-online d-none d-md-block">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                </div>
            </div>
        </div>
    </div>';
    
        }else if(in_array($extentionUpload,$extentionsAudio)){
        echo '<div class="message mt-3  d-flex justify-content-end" style="width:100%">
        <div class="message-right m-1 d-flex justify-content-end" style="width:90%">
            <div class="message-text p-3 bg-primary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
                <audio src="../assets/imageMessage/'.$message['piece'].'" class="w-100 h-100" controls id="audio_notification"></audio>
                <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
            </div>
            <div class="image-user" style="width:10%">
                <div class="avatar avatar-online d-none d-md-block">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                </div>
            </div>
        </div>
    </div>';
        }
       
       }
      }else
      {
        if(!is_null($message['contenu_message']) ){
            echo '<div class="message mt-3 mb-3 d-flex">
            <div class="message-left m-1 d-flex  " style="width:90%">
                <div class="image-user" style="width:10%">
                    <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                    </div>
                </div>
                <div class="message-text p-3 bg-secondary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
                <p class="">'.$message['contenu_message'].'</p>
                    <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
                </div>
            </div>
        </div>';
           }
          
           if(!is_null($message['piece'])){
            $extentionUpload= strtolower(substr(strrchr($message['piece'], '.'), 1));
            if(in_array($extentionUpload,$extentionsImage)){ 
                
        echo '<div class="message mt-3 mb-3 d-flex">
            <div class="message-left m-1 d-flex  " style="width:90%">
                <div class="image-user" style="width:10%">
                    <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                    </div>
                </div>
                <div class="message-text p-3 bg-secondary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
                <p class=""><img class="w-100 img-fluid" src="../assets/imageMessage/'.$message['piece'].'" alt=""></p>
                    <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
                </div>
            </div>
        </div>';
            }else if(in_array($extentionUpload,$extentionsVideo)){
            
            echo '<div class="message mt-3 mb-3 d-flex">
            <div class="message-left m-1 d-flex  " style="width:90%">
                <div class="image-user" style="width:10%">
                    <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                    </div>
                </div>
                <div class="message-text p-3 bg-secondary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
                <p><video class="w-100 h-100" controls src="../assets/imageMessage/'.$message['piece'].'"></video>
                    </p>    <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
                </div>
            </div>
        </div>';
            }
            else if(in_array($extentionUpload,$extentionsAudio)){
               
            echo '<div class="message mt-3 mb-3 d-flex">
            <div class="message-left m-1 d-flex  " style="width:90%">
                <div class="image-user" style="width:10%">
                    <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/'.$message['url'].'" class="w-px-40 h-auto rounded-circle" />
                    </div>
                </div>
                <div class="message-text p-3 bg-secondary rounded-3 text-white">
                <h6 class="text-start mb-3 text-white h6">'.$message['nom'].'  '.$message['prenom'].'</h6>
                <p> <audio src="../assets/imageMessage/'.$message['piece'].'" class="h-100 w-100" controls autoplay id="audio_notification"></audio>
                </p>  <span class="text-end position-end text-white-50">'.$message['sendAt'].'</span>
                </div>
            </div>
        </div>';
            }
           }
     
      }
     

  }

}else{
    echo '<div class="message-left mt-2 text-black d-flex justify-content-start">
          
          <div class="card p-1 pb-0 message-box bg-light">
              <p>  Vous n\'avez aucun message! Commencer à ecrire
                       </p>
          </div>
      </div>';
}
}else{
    echo "Attention monsieur on vous suit de pret";
}
  ?>       
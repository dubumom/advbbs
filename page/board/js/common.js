let reply_mod_btn = document.querySelectorAll('.reply .edit');
let reply_del_btn = document.querySelectorAll('.reply .delete');

console.log(reply_mod_btn);

// 댓글 수정
for(let m_btn of reply_mod_btn){
  m_btn.addEventListener('click',(e)=>{
    let target = e.target.closest('.reply').querySelector('.edit_dialog');
    let closeBtn = target.querySelector('button:last-of-type');
    target.setAttribute('open','open');
    closeBtn.addEventListener('click',()=>{
      target.removeAttribute('open');
    });
  });
}
// 댓글 삭제
for(let d_btn of reply_del_btn){
  d_btn.addEventListener('click',(e)=>{
    let target = e.target.closest('.reply').querySelector('.del_dialog');
    let closeBtn = target.querySelector('button:last-of-type');
    
    target.setAttribute('open','open');
    closeBtn.addEventListener('click',()=>{
      target.removeAttribute('open');
    });
  });
}

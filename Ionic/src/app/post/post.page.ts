import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-post',
  templateUrl: './post.page.html',
  styleUrls: ['./post.page.scss'],
})
export class PostPage implements OnInit {

	constructor() { }
  dadosPost:object = [{
  name: 'João',
  title:'Otimo episodio',
  text: 'sdlkfjasiocnaosicdbauiscdbiasudhasuio',
  likes: 0,
  dislikes: 0,
  disliked: false,
  liked: false,
  spoiler: true,
  episode:{
    serie: 'Sei la',
    number: 1,
  },
  comment:{
    userName: 'Lol',
    text: 'sdfhsdocvnjioasdcnklfhio',
  }
  },
  {
  name: 'João',
  title:'Otimo episodio',
  text: 'sdlkfjasiocnaosicdbauiscdbiasudhasuio',
  likes: 0,
  dislikes: 0,
  disliked: false,
  liked: false,
  spoiler: false,
  episode:{
  serie: 'Sei la',
  number: 1,
  },
  comment:{
  userName: 'Lol',
  text: 'sdfhsdocvnjioasdcnklfhio',
  }
  }

  ];
  like(dadosPost){
    if (dadosPost.liked) {
      dadosPost.likes--;
    }
    if(((!(dadosPost.liked)) && dadosPost.disliked) || ((!(dadosPost.liked)) && (!(dadosPost.disliked)))){
      dadosPost.likes++;
      if(dadosPost.dislikes!=0)
        dadosPost.dislikes--;

      dadosPost.disliked = false;
    }
    dadosPost.liked = !(dadosPost.liked);
    if(!(dadosPost.liked) && !(dadosPost.disliked)){

    }
  }
  dislike(dadosPost){
    if (dadosPost.disliked) {
      dadosPost.dislikes--;

    }
    if((!(dadosPost.disliked)) && dadosPost.liked || ((!(dadosPost.disliked)) && (!(dadosPost.liked)) )){
      dadosPost.dislikes++;
      if(dadosPost.likes!=0)
        dadosPost.likes--;
      dadosPost.liked = false;
    }
    dadosPost.disliked = !(dadosPost.disliked);
  }
  	ngOnInit() {
  }
}

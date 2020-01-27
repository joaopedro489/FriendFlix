import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-post',
  templateUrl: './post.page.html',
  styleUrls: ['./post.page.scss'],
})
export class PostPage implements OnInit {
	
	constructor() { }
 	dadosPost:object = {
  	name: 'João',
  	title:'Otimo episodio',
  	text: 'sdlkfjasiocnaosicdbauiscdbiasudhasuio',
  	likes: 0,
  	dislikes: 0,
  	reacted: false, 
  	episode:{
  		serie: 'Sei la',
  		number: 1, 
  	},
  	comment:{
  		userName: 'Lol',
  		text: 'sdfhsdocvnjioasdcnklfhio',
  	}
  }
  	like(dadosPost){
  		dadosPost.reacted = !(dadosPost.reacted);
  		dadosPost.likes++;
  	}
  	ngOnInit() {
  }
}


//
//  ViewController.swift
//  Coursework
//
//  Created by admin on 19/02/2018.
//  Copyright © 2018 admin. All rights reserved.
//

import UIKit

class ViewController: UIViewController {

    @IBOutlet weak var gameWinner: UILabel!
    @IBOutlet weak var btnPlay: UIButton!
    @IBOutlet weak var button: UIButton!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        btnPlay.isHidden = true
        // Do any additional setup after loading the view, typically from a nib.
    }
    
    var activePlayer = 1 //this will set the current player
    var gameState = [0,0,0,0,0,0,0,0,0]
    
    let winningCombinations = [[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]]
    var gameActive = true
    
    @IBAction func buttonPress(_ sender: UIButton) {
        if (activePlayer == 1){
            sender.setImage(UIImage(named:"Cross.jpeg"), for: UIControlState())
                activePlayer = 2
        }
        else{
            sender.setImage(UIImage(named:"Nought.jpeg"), for: UIControlState())
                activePlayer = 1
        }
        
        if (gameState[sender.tag-1] == 0) {
            gameState[sender.tag-1] = activePlayer
        }
        
        for combination in winningCombinations
        {
            if gameState[combination[0]] != 0 && gameState[combination[0]] == gameState[combination[1]] && gameState[combination[1]] == gameState[combination[2]]
            {
                gameActive = false
                
                if gameState[combination[0]] == 1{
                    //Nought has won
                    gameWinner.text = "Player 2 wins!"
                    btnPlay.isHidden = false
                }else if gameState[combination[0]] == 2{
                    //Cross has won
                    gameWinner.text = "Player 1 wins!"
                    btnPlay.isHidden = false
                }else{
                    //Game is a draw
                    gameWinner.text = "Game is a draw"
                    btnPlay.isHidden = false
                }
            }
        }
    }
    
    @IBAction func playAgain(_ sender: Any) {
        gameState = [0,0,0,0,0,0,0,0,0]
        for i in [1,2,3,4,5,6,7,8,9]
        {
            let button = view.viewWithTag(i) as! UIButton
            button.setImage(nil, for: UIControlState())
        }
        btnPlay.isHidden = true
        gameWinner.text = ""
    }
    
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}


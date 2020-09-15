import React, { Component } from 'react';

import Snake from './entity/snake';
import Food from './entity/food';

function getRandomPosition() {
    return ([
        Math.floor(Math.random() * 49) * 2,
        Math.floor(Math.random() * 49) * 2,
    ]);
}

function getInitailState() {
    return ({
        snakePosition: [
            [0, 0],
            [0, 2],
        ],
        foodPosition: [getRandomPosition(), getRandomPosition()],
        snakeDirection: "Right",
        moveSpeed: 200,
    });
}

class App extends Component {

    state = getInitailState();
    gameTimer = setInterval(this.moveSnake, this.state.moveSpeed);

    // 第一次render完成前
    componentDidMount() {
        this.updateGameTimer();
        document.onkeydown = this.onkeydown;
    }

    // 每次render前
    componentDidUpdate() {
        this.checkIfOutBorder();
        this.collapseItself();
        this.eatFood();
    }

    onkeydown = (e) => {
        switch (e.keyCode) {
            case 37:
                this.setState({ snakeDirection: "Left" });
                break;
            case 38:
                this.setState({ snakeDirection: "Up" });
                break;
            case 39:
                this.setState({ snakeDirection: "Right" });
                break;
            case 40:
                this.setState({ snakeDirection: "Down" });
                break;
            default:
                break;
        }
    }

    updateGameTimer = () => {
        clearInterval(this.gameTimer);
        this.gameTimer = setInterval(this.moveSnake, this.state.moveSpeed);
    }

    moveSnake = () => {
        let pos = [...this.state.snakePosition];
        let head = pos[pos.length - 1];

        switch (this.state.snakeDirection) {
            case "Left":
                head = [head[0], head[1] - 2];
                break;
            case "Up":
                head = [head[0] - 2, head[1]];
                break;
            case "Right":
                head = [head[0], head[1] + 2];
                break;
            case "Down":
                head = [head[0] + 2, head[1]];
                break;
            default:
                break;
        }
        pos.push(head);
        pos.shift();
        this.setState({ snakePosition: pos });
    }

    checkIfOutBorder = () => {
        let head = this.state.snakePosition[this.state.snakePosition.length - 1];
        if (head[0] > 100 || head[1] > 100 || head[0] < 0 || head[1] < 0) {
            this.gameOver();
        }
    }

    collapseItself = () => {
        let snakePosition = [...this.state.snakePosition];
        let head = snakePosition[snakePosition.length - 1];

        snakePosition.pop();
        snakePosition.forEach((pos) => {
            if (head[0] === pos[0] && head[1] === pos[1]) {
                this.gameOver();
            }
        });
    }

    eatFood = () => {
        let snakePosition = [...this.state.snakePosition];
        let head = snakePosition[snakePosition.length - 1];
        this.state.foodPosition.forEach((pos) => {
            if (head[0] === pos[0] && head[1] === pos[1]) {
                this.levelUp(pos);

            }
        });
    }

    gameOver = () => {
        alert('Your Score: ' + this.state.snakePosition.length.toString());
        this.setState(getInitailState());
    }

    levelUp = (pos) => {
        let foodPosition = [...this.state.foodPosition];

        // food
        foodPosition.push(getRandomPosition());
        foodPosition.push(getRandomPosition());
        this.setState({ foodPosition: foodPosition.filter((food) => (food !== pos)) });

        // snake
        let snakePosition = [...this.state.snakePosition];
        snakePosition.unshift(snakePosition[0]);
        this.setState({ snakePosition: snakePosition });

        // speed
        this.setState({ moveSpeed: this.state.moveSpeed > 10 ? this.state.moveSpeed - 10 : 10 });
        this.updateGameTimer();
    }

    render() {
        return (
            <div className="game-area" >
                <Snake snakePosition={this.state.snakePosition} />
                <Food foodPosition={this.state.foodPosition} />
            </div>
        );
    };
}

export default App;

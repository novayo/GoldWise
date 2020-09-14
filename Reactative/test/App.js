import { StatusBar } from 'expo-status-bar';
import React, {useState} from 'react';
import { StyleSheet, Text, View, FlatList, Alert, TouchableWithoutFeedback, Keyboard, TouchableWithoutFeedbackComponent} from 'react-native';
import Header from './components/Header'
import TodoListItem from './components/TodoListItem'
import AddTodos from './components/AddTodos';

export default function App() {

  const [todos, setTodos] = useState([
    {work: 'buy milk', id: 1},
    {work: 'pick up kevin', id: 2},
    {work: 'look up computer', id: 3},
    {work: 'study english', id: 4},
    {work: 'work out', id: 5},
  ]);

  const clickHandler = (id) => {
    setTodos(todos.filter((todo) => {
      return (todo.id != id);
    }));
  }

  const updateState = (text) => {
    if (text.length > 3){
      setTodos([{work: text, id: Math.random().toString()}, ...todos]);
    }
    else{
      Alert.alert("OPPS !", "Todo's text msut be over 3 chars.", [
        {text: 'understood', onPress: () => console.log("Alert Popup")}
      ]);
    }
    
  }

  return (
    <TouchableWithoutFeedback onPress={() => {Keyboard.dismiss();}}>
      <View style={styles.container}>
        {/* Header */}
        <Header />
        {/* Todos */}
        <View style={styles.content}>
          <AddTodos updateState={updateState}/>
          <FlatList 
            data={todos}
            keyExtractor={(item) => (item.id.toString())}
            renderItem={({item}) => (
              <TodoListItem item={item} deleteItem={clickHandler} />
            )}
          />
        </View>
      </View>
    </TouchableWithoutFeedback>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    // alignItems: 'center',
    // justifyContent: 'center',
  },
  content: {
    flex:1,
    // width: '100%',
  },
});

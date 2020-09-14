# React Native

[![hackmd-github-sync-badge](https://hackmd.io/U6zG3M1uSMWQAsGmIo7fiA/badge)](https://hackmd.io/U6zG3M1uSMWQAsGmIo7fiA)

###### tags: `React`

## [安裝環境](https://www.youtube.com/watch?v=pflXnUNMsNk&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=2)
* React Native cli
* Expo cli (這裡用的)
    * `sudo npm install expo-cli --global`
    * `expo init project-name` -> blank
    * /assets：存放圖片

## [view, text, stylesheet](https://www.youtube.com/watch?v=_YydVvnjNFE&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=3)
* 不能用css
    * 能用stylesheet去創建
    * 不同的tag不能被繼承，所以必須一一去指定 
    * 相同的tag才能被繼承
* 文字
    * 一定只能用`<Text></Text>`包起來
* div
    * 由`<View></View>`代替

## [state](https://www.youtube.com/watch?v=1FiIYaRr148&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=4)
* hooks in state
    * 參數值為person, setPerson為設置函數
```javascript=
import {useState} from 'react';
const [person, setPerson] = useState({name: 'Eric', age: 23});
```
* button
    * title：文字名稱
    * onPress：連接函數
```javascript=
<Button title="Click me !" onPress={pressHandler}/>
```

## [TextInput](https://www.youtube.com/watch?v=c9Sg9jDitm8&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=5)
* 輸入匡
    * multiline：能輸入多行
    * keyboardType：限制輸入的鍵盤
    * style：css
    * placeholder：提示字樣
    * onChangeText：如果改變的話
```javascript=
<View style={styles.header}>
    <Text>Enter Age:</Text>
    <TextInput 
      multiline
      keyboardType='numeric'
      style={styles.input} 
      placeholder="18" 
      onChangeText={(val) => inputAgeHandler(val)}/>
</View>
```

## [List & ScrollList](https://www.youtube.com/watch?v=W-pg1r6-T0g&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=6)
* ScrollView：被包起來的區域可以滑動
* List：用map取出
```javascript=
const [peopleList, setPeopleList] = useState([
    {name: "Eric", age: 18, id: 1},
    {name: "Amy", age: 18, id: 2},
    {name: "Som", age: 18, id: 3},
    {name: "Terry", age: 18, id: 4},
    {name: "Admn", age: 18, id: 5},
]);

{peopleList.map((people) => {
  return (
    <View key={people.id}>
      <Text style={styles.item}>people.name people.age</Text>
    </View>
  );
})}
```

## [Flat List](https://www.youtube.com/watch?v=iMCM1NceGJY&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=7)
* FlatList = List + ScrollView
    * 有個好處，他會自動去只顯示前面幾的資料，滑下去才會再繼續顯示，因此當資料多的時候，資源佔的比較少
```javascript=
<FlatList 
    data = {peopleList}
    keyExtractor = {(item) => (item.id.toString())}
    renderItem = {({item}) => (
      <Text style={styles.item2}>{item.name} {item.age}</Text>
    )}
/>
```

## [TouchableOpacity](https://www.youtube.com/watch?v=QhX25YGf8qg&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=8)
* 使Text可以被按
```javascript=
<TouchableOpacity onPress={() => touchHandler(item.id)}>
    <Text style={styles.item2}>{item.name} {item.age}</Text>
</TouchableOpacity>
```

## [Alert](https://www.youtube.com/watch?v=oVA9JgTTiT0&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=12)

```javascript=
import {Alert} from 'react-native'
Alert.alert('Title', 'Content', [
    {text: 'button1_text', onPress: ()=>funciton1()},
    {text: 'button2_text', onPress: ()=>funciton2()},
])
```

## [TouchableWithoutFeedback & Keyboard](https://www.youtube.com/watch?v=IW-SEiRjUsI&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=13)
* dismiss the keyboard，按其他地方鍵盤會消失

```javascript=
import {TouchableWithoutFeedback, Keyboard} from 'react-native'
<TouchableWithoutFeedback onPress={() => {Keyboard.dismiss()}}>
    // do-something
</TouchableWithoutFeedback>
```

## [flex 概念](https://www.youtube.com/watch?v=R2eqAgR_KlU&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=14)
* 參數
    * flex：要佔幾等分
    * flexDirection：方向（預設是column）
    * justifyContent：左右要怎麼分佈
    * alignItems：上下要怎麼分佈
* 在最外層的View中，可以設定flexDirection，justifyContent，alignItems，內部的元件可以個別設置flex要佔幾格

## [icons](https://www.youtube.com/watch?v=C4ikFaP0a5o&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=15)
* [官網查詢](https://icons.expo.fyi/)

## [Custom Fonts](https://www.youtube.com/watch?v=IY5OBeL9LNE&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=17)
* 先去[google font](https://fonts.google.com/?preview.text=nannito&preview.text_type=custom)查詢想要的字型並下載
* 把要的字型（.ttf檔案）丟入/assets/fonts/中
* 載入fonts
```javascript=
import * as Font from 'expo-font'; // 載入Font用於load字型

// 正常來說，要在componentDidMount內實踐
// 但因為是function，故在載入時，等待load完成
import {AppLoading} from 'expo';   

...

// 建立載入的函數，loadAsync 為 背景執行，但若字型還為載入就出現了會有問題，所以用state去控制狀態
const getFonts = () => Font.loadAsync({
    'nunito-bold': require('./assets/fonts/Nunito-Bold.ttf'),
    'nunito-regular': require('./assets/fonts/Nunito-Regular.ttf'),
});

const [fontLoaded, setFontLoaded] = useState(false);

if (fontLoaded){
    return (
      // <Home />
      // <About />
      <Review />
    );
}
else{
    return (
      // 在load時，等待getFonts完成，之後再setFontLoaded
      <AppLoading 
        startAsync={getFonts}
        onFinish={() => setFontLoaded(true)}
      />
    );
}
```

## [React Navigation](https://www.youtube.com/watch?v=OmQCU-3KPms&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=19)
* 作用：使每個頁面能互相流通
* [安裝React Navigation](https://reactnavigation.org/docs/getting-started#installation)：`sudo npm install @react-navigation/native`
* [安裝在特定的專案中](https://reactnavigation.org/docs/getting-started#installing-dependencies-into-an-expo-managed-project)：`expo install react-native-gesture-handler react-native-reanimated react-native-screens react-native-safe-area-context @react-native-community/masked-view`
* ==NavigationContainer 同一層只能有一個==
    * ==所以如果是單純的stack，則每個頁面都是一層，故每個頁面都需要NavigationContainer==
    * ==如果是drawer，則drawer有NavigationContainer即可，剩下的頁面只要建立個別的stack==

## [React Navigation Stack](https://www.youtube.com/watch?v=cS4PgI3zBzY&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=20)
* 作用：將每個頁面用stack的方式存起來，作出上一頁的效果
* 安裝react-navigation-stack：
    * `sudo npm install @react-navigation/stack`
    * `sudo npm install @react-navigation/native`
    * `expo install react-native-gesture-handler react-native-reanimated react-native-screens react-native-safe-area-context @react-native-community/masked-view`
### [React Navigation Stack(More)](https://www.youtube.com/watch?v=PMX6GP1TXGo&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=21)
* 使用
```javascript=
// routes/HomeStack.js
import React from "react";
import { NavigationContainer } from "@react-navigation/native"; // 將nav包成app可解析的東西
import { createStackNavigator } from "@react-navigation/stack"; // 創建nav stack
import Home from '../screen/Home';    // 我的view
import Review from '../screen/Review';// 我的view

const { Navigator, Screen } = createStackNavigator();

// 預設顯示第一個，有寫screen才能放進stack內，
// 且會給一個props.navigation => 
// navigation.push(有定義的Screen name)：到screen
// navigation.navigate(有定義的Screen name)：到screen
// navigation.pop()：回到上一頁
// navigation.goBack()：回到上一頁
const HomeNavigator = () => (
  <Navigator headerMode="none">
    <Screen name="Home" component={Home} />
    <Screen name="Review" component={Review} />
  </Navigator>
);
  
// 將stack包起來並export
export const AppNavigator = () => (
  <NavigationContainer>
    <HomeNavigator />
  </NavigationContainer>
);
```
```javascript=
// App.js
import {AppNavigator} from './routes/HomeStack';
<AppNavigator />
```

### [Navigation - Pass data to next page](https://www.youtube.com/watch?v=-40TBdSRk6E&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=22)
* A傳給B
* A：`navigation.navigate('B', item)`
* B：在props內有個route，`const item = route.params;` `{item.title}`

### [Navigation Options](https://www.youtube.com/watch?v=llPRMRl_ZTM&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=23)
* 對上方的BAR做設定
* screenOptions：對每個screen都做設定
* options：對特定screen做設定
```javascript=
const HomeNavigator = () => (
  // <Navigator headerMode="none">
  <Navigator screenOptions={styles.Default}>
    <Screen name="Home" component={Home} options={styles.Home} />
    <Screen name="Review" component={Review} options={styles.Review} />
  </Navigator>
);
```

## [React Navigation Drawer](https://www.youtube.com/watch?v=EaNCi8o8H0A&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=24)
* 作用：左邊有個Drawer，點開之後會顯示所有頁面的標誌
* 安裝react-navigation-drawer：
    * `sudo npm install @react-navigation/drawer`
* 作法：
```javascript=
// drawer.js
import React from "react";
import { NavigationContainer } from "@react-navigation/native";
import { createDrawerNavigator } from '@react-navigation/drawer'; // 引入

import HomeStack from './HomeStack';
import AboutStack from './AboutStack';

const { Navigator, Screen } = createDrawerNavigator();

const DrawerNavigator = () => (
    <Navigator initialRouteName='HomeStack'> // 把stack當作screen包起來
      <Screen name="HomeStack" component={HomeStack} />
      <Screen name="AboutStack" component={AboutStack} />
    </Navigator>
  );

export const AppNavigator = () => (
    <NavigationContainer> // 用Container包起來
      <DrawerNavigator />
    </NavigationContainer>
);

export default AppNavigator;
```

### [Custom Header Component](https://www.youtube.com/watch?v=C3oDJdlrEKE&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=25)
* 如果要統一header的話，就必須建造一個header.js，之後再建立物件上去即可
* 在option裡，用headerTitle就可以要求物件，但必須是回傳之後的
    * 而因為按下header中的icon時要使用 `navigation.openDrawer()`，
    * 故必須把navigation傳進去，==此navigation是由drawer把stack包起來後給的==
    * 因此要 `export const HomeStack = ({navigation}) => ()`
```javascript=
// HomeStack.js
<Screen name="Home" component={Home} options={{headerTitle: () => <Header navigation={navigation} title='GameZone' />}} />
```

## [Card Component](https://www.youtube.com/watch?v=5NewXsBnoKw&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=26)
* `{props.children}`：用這個去拿，被<Card></Card>包起來的東西
* css
```javascript=
const styles = StyleSheet.create({
    card:{
        borderRadius: 6,
        elevation: 3,
        backgroundColor: '#fff',
        shadowOffset: {width: 1, height:1},
        shadowColor: '#333',
        shadowOpacity: 0.3,
        shadowRadius: 2,
        marginHorizontal: 4,
        marginVertical: 6,
    },
    cardContent:{
        marginHorizontal: 18,
        marginVertical: 10,
    },
});
```

## [Images](https://www.youtube.com/watch?v=2s5KNg_5_LA&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=27)
* 用法
    * 注意：這裡的位置不能是concate的，只能在外面先concate好後丟進來
```javascript=
import {Image} from 'react-native'
<Image source={require('位置')} />
```

* background
    * 在headerBackground中傳入
```javascript=
export const HomeStack = ({navigation}) => (
  // <Navigator headerMode="none">
  <Navigator screenOptions={styles.Default}>
    <Screen name="Home" component={Home} options={{
      headerTitle: () => <Header navigation={navigation} title='GameZone' />,
      headerBackground: () => <Image source={require('../assets/game_bg.png')} style={{height: 100}} />
    }} />
    <Screen name="Review" component={Review} options={styles.Review} />
  </Navigator>
);
```

## [Modal](https://www.youtube.com/watch?v=pYh3Z-iBc4E&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=29)
* 會佔取整個頁面，寫在頁面1則只會出現在頁面1
    * visible：用於控制是否出現，故用一個變數去控制
    * animationType：出現形式
    * 
```javascript=
import {Modal} from 'react-native';
<Modal visible={showModal} animationType='slide'>
    <View style={styles.modalContent}>
        <Octicons 
            name="diff-removed" 
            onPress={() => setShowModal(false)} 
            size={30} 
            color="black"
            style={styles.modalCloseToggle} />
        <Text>Hello from Modal.</Text>
    </View>
</Modal>
```

## [Formik](https://www.youtube.com/watch?v=t4Q1s8WntlA&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=30)
* 安裝：`sudo npm install formik`
* 用法
    * initialValues：設定state
    * onSubmit：props.handleSubmit會跑這個函數，其中，value是設定的initialValues，可由props.values.title去取用
    * props：由Formik提供的，
    * multiline：可多行
    * minHeight：增加高度，可使使用者知道可以輸入很多行
```javascript=
import {Formik} from 'formik';

<Formik
    initialValues={{title: '', rate: '', body: ''}}
    onSubmit={(value, action) => {
        action.resetForm();
        addNewReview(value);
    }}
>
{(props) => (
    <View>
        <TextInput 
            multiline
            minHeight={100}
            style={globalStyles.input}
            placeholder='Review Title'
            onChangeText={props.handleChange('title')}
            value={props.values.title}
        />
        <Button title='Submit' color='maroon' onPress={props.handleSubmit} />
    </View>
)}
</Formik>
```

## [Yup](https://www.youtube.com/watch?v=ftLy78R8xrg&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=32)
* 安裝：`sudo npm install yup`
* 用法：
    * yup.object：建立架構
        * title必須要：是"string" 且 "需要填寫" 且 "最少字數1"
        * body必須要：是"string" 且 "需要填寫" 且 "最少字數5"
        * rate必須要：是"string" 且 "需要填寫" 且 "符合測試 => (測試名稱, 錯誤訊息, 測試內容)"
    * 放在formik內的validationSchema，要通過之後才會執行submit
```javascript=
import * as yup from 'yup';
const reviewSchema = yup.object({
    title: yup.string()
        .required()
        .min(1),
    body: yup.string()
        .required()
        .min(5),
    rate: yup.string()
        .required()
        .test('nameOfTesting', 'Pls rate a number 1-5', (value)=>{
            return parseInt(value) < 6 && parseInt(value) > 0;
        })
});

<Formik
    initialValues={{title: '', rate: '', body: ''}}
    validationSchema={reviewSchema}
    onSubmit={(value, action) => {
        action.resetForm();
        addNewReview(value);
    }}
>
......
```

### [Show Error Msg](https://www.youtube.com/watch?v=o_ErcEKV23I&list=PL4cUxeGkcC9ixPU-QkScoRBVxtPPzVjrQ&index=33)
* 在輸入匡下面顯示訊息
    * props.touched.title：如果按到title的話，回傳true
    * props.errors.title：title的錯誤訊息
    * onBlur={props.handleBlur('title')}：當title被動過的話，就validation，否則只有按下submit之後，才會判斷是否符合規則
```javascript=
<Formik>
.....

{(props) => (
<View>
    <TextInput 
        style={globalStyles.input}
        placeholder='Review Title'
        onChangeText={props.handleChange('title')}
        value={props.values.title}
        onBlur={props.handleBlur('title')}
    />
    <Text style={globalStyles.errorMsg}>{props.touched.title && props.errors.title}</Text>
</View>

....
</Formik>
```
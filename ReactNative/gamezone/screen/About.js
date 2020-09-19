import React from 'react';
import { StyleSheet, Text, View } from 'react-native'

export default function About() {
    return (
        <View style={styles.container}>
            <Text style={styles.titleText}>
                這是個簡單的React-Native的CRUD實踐。{"\n"}{"\n"}
                C：在主頁面上按下"+"即可新增文章。{"\n"}
                R：點下每個區塊，即可看到文章標題、內容、及評分。{"\n"}
                U：每個區塊的右下角第一個圖示中，即為編輯文章。{"\n"}
                D：每個區塊的右下角第二個圖示中，即為刪除文章。{"\n"}
                資料庫為：firebase
            </Text>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        alignItems: 'center',
    },
    titleText: {
        fontSize: 15,
        fontFamily: 'nunito-bold',
        borderStyle: 'dashed',
        borderWidth: 1,
        padding: 15,
    }
});
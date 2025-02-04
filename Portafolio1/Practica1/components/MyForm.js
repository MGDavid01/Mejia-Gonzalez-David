import React, { useState } from "react";
import { StyleSheet, View, Text, TextInput , TouchableOpacity } from 'react-native';


export default function MyForm() {
    const [text, setText] = useState("");
    const [displayText, setDisplayText] = useState("");

    const handlePress = () => {
    setDisplayText(text);
    setText('');
    }

    return (
        <View style={styleForm.form}>
            <TextInput
                style= {styleForm.input}
                placeholder = 'Inserta Texto Aqui'
                value = {text}
                onChangeText = {setText}
            />
            <TouchableOpacity
                style = {styleForm.button}
                title = 'Enviar'
                onPress = {handlePress}
            >
                <Text style = {styleForm.buttonText}>Enviar</Text>
            </TouchableOpacity>
            <Text style = {styleForm.textResult}>{displayText}</Text>
        </View>
    );
}

const styleForm = StyleSheet.create({
    form: {
      backgroundColor: '#f5f5f5',
      alignItems: 'center',
      justifyContent: 'center',
      padding: 2,
      width: '90%',
      height: 'auto'
    },
    input: {
      width: '80%',
      marginTop: 10,
      marginBottom: 10,
      padding: 10,
      marginVertical: 10,
      borderWidth: 1,
      borderColor: '#ddd',
      borderRadius: 8,
      fontSize: 16,
      backgroundColor: '#fff',
      textAlign:'center',
    },
    button: {
      width: '60%',
      padding: 12,
      backgroundColor: '#007bff',
      borderRadius: 8,
      alignItems: 'center',
    },
    buttonText: {
      color: '#fff',
      fontSize: 16,
      fontWeight: 'bold',
    },
    textResult: {
      padding: 5,
      fontSize: 18,
      color: '#333',
      fontWeight: 'bold',
      textAlign: 'center'
    },
  });
  
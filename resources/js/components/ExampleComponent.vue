<template>
  <v-container fluid>
    <v-layout>
      <v-flex>
        <v-card>
          <v-btn small fab color="info" absolute top right @click=handleSaveButtion>save</v-btn>
          <v-card-text>
            <v-textarea label="自由にメモを記載してください。" v-model=memo rows=15 ></v-textarea>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<template>
  <v-content>
    <v-container fluid class="d-flex">
      <v-col cols="12" md="12">
        <v-form ref="form" v-model="valid" lazy-validation justify="center">
          <v-row align="center" justify="center">
            <v-card class="mx-auto">
              <v-card-title class="blue">
                <v-list-item>
                  <v-list-item-action>
                    <v-icon>mdi-upload</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title class="headline white--text">イベント告知</v-list-item-title>
                    <v-list-item-subtitle
                      class="white--text"
                    >イベントの告知が可能です。ここで登録した内容はInformationに表示されます。</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card-title>
              <v-col cols="12" md="12">
                <v-text-field
                  prepend-icon="mdi-calendar-edit"
                  v-model="name"
                  :counter="10"
                  :rules="nameRules"
                  label="イベント名"
                  required
                ></v-text-field>

                <v-textarea
                  prepend-icon="mdi-comment-multiple-outline"
                  v-model="email"
                  :rules="emailRules"
                  label="イベント詳細情報"
                  required
                ></v-textarea>

                <v-text-field
                  prepend-icon="mdi-google"
                  v-model="name"
                  :counter="10"
                  :rules="nameRules"
                  label="イベント参照URL"
                  required
                ></v-text-field>

                <v-text-field
                  prepend-icon="mdi-av-timer"
                  v-model="name"
                  :counter="10"
                  :rules="nameRules"
                  label="イベント受付期間締切日"
                  required
                ></v-text-field>

                <v-text-field
                  prepend-icon="mdi-lastpass"
                  v-model="name"
                  :counter="10"
                  :rules="nameRules"
                  label="イベント表示最終日"
                  required
                ></v-text-field>

                <v-select prepend-icon="mdi-help-circle" :items="items" v-model="itemDefault"></v-select>

              </v-col>
              <v-card-actions class="justify-center">
                <v-btn large block class="primary">イベント情報登録</v-btn>
              </v-card-actions>
            </v-card>
          </v-row>
        </v-form>
      </v-col>
    </v-container>
  </v-content>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          text: "大会",
          value: "1"
        },
        {
          text: "告知",
          value: "2"
        },
        {
          text: "その他",
          value: "3"
        }
      ],
      itemDefault: "1"
    };
  }
};
</script>

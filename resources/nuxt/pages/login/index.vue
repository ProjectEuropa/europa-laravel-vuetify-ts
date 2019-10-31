<template>
  <v-content>
    <v-container>
      <v-layout row class="text-xs-center">
        <v-flex class="grey lighten-4">
          <v-container style class="text-xs-center">
            <v-card flat>
              <v-card-title primary-title>
                <h4>Login</h4>
              </v-card-title>
              <v-form>
                <v-col cols="12" md="12">
                  <v-text-field
                    prepend-icon="mdi-account-circle"
                    v-model="name"
                    :counter="10"
                    :rules="nameRules"
                    label="メールアドレス"
                    required
                  ></v-text-field>
                  <v-text-field
                    prepend-icon="mdi-lock"
                    v-model="name"
                    :counter="10"
                    :rules="nameRules"
                    label="パスワード"
                    required
                  ></v-text-field>
                </v-col>
                <v-card-actions>
                  <v-btn primary large block class="primary">Login</v-btn>
                </v-card-actions>
              </v-form>

              <v-col cols="12" md="12">
                <v-card-title class="cyan">
                  <v-icon large left>mdi-twitter</v-icon>
                  <span class="title font-weight-light">Login with Twitter</span>
                </v-card-title>
              </v-col>
            </v-card>
          </v-container>
        </v-flex>
      </v-layout>
    </v-container>
  </v-content>
</template>

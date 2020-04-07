<template>
  <v-content>
    <v-container>
      <v-layout row class="text-xs-center">
        <v-flex class="grey lighten-4">
          <v-container style class="text-xs-center">
            <v-card flat>
              <v-card-title primary-title>
                <h4>Register</h4>
              </v-card-title>
              <v-form>
                <v-col cols="12" md="12">
                  <ValidationProvider v-slot="{ errors }" name="名前" rules="required|max:100">
                    <v-text-field
                      prepend-icon="mdi-account-circle"
                      v-model="name"
                      :counter="100"
                      :error-messages="errors"
                      label="名前"
                      required
                    ></v-text-field>
                  </ValidationProvider>
                  <ValidationProvider
                    v-slot="{ errors }"
                    name="メールアドレス"
                    rules="required|max:100|email"
                  >
                    <v-text-field
                      prepend-icon="mdi-email"
                      v-model="email"
                      :counter="100"
                      :error-messages="errors"
                      label="メールアドレス"
                      required
                    ></v-text-field>
                  </ValidationProvider>
                  <ValidationProvider
                    v-slot="{ errors }"
                    name="パスワード"
                    rules="required|max:100|confirmed:password_confirmation"
                  >
                    <v-text-field
                      prepend-icon="mdi-lock"
                      v-model="password"
                      :counter="100"
                      :error-messages="errors"
                      type="password"
                      label="パスワード"
                      required
                    ></v-text-field>
                  </ValidationProvider>
                  <ValidationProvider
                    v-slot="{ errors }"
                    name="パスワード再確認"
                    vid="password_confirmation"
                    rules="required|max:100"
                  >
                    <v-text-field
                      prepend-icon="mdi-lock"
                      v-model="password_confirmation"
                      :counter="100"
                      :error-messages="errors"
                      type="password"
                      label="パスワード再確認"
                      required
                    ></v-text-field>
                  </ValidationProvider>
                </v-col>
                <v-card-actions>
                  <v-btn primary large block class="primary">Register</v-btn>
                </v-card-actions>
              </v-form>
            </v-card>
          </v-container>
        </v-flex>
      </v-layout>
    </v-container>
  </v-content>
</template>


<script lang="ts">
import { Vue, Component } from "vue-property-decorator";

@Component
export default class Login extends Vue {
  name: string = "";
  email: string = "";
  password: string = "";
  password_confirmation = "";
}
</script>

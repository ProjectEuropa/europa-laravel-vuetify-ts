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
                  <ValidationProvider v-slot="{ errors }" name="メールアドレス" rules="required|max:100|email">
                    <v-text-field
                      prepend-icon="mdi-email"
                      v-model="email"
                      :counter="100"
                      :error-messages="errors"
                      label="メールアドレス"
                      required
                    ></v-text-field>
                  </ValidationProvider>
                  <ValidationProvider v-slot="{ errors }" name="パスワード" rules="required|max:100">
                    <v-text-field
                      prepend-icon="mdi-lock"
                      v-model="password"
                      :counter="100"
                      :error-messages="errors"
                      label="パスワード"
                      type="password"
                      required
                    ></v-text-field>
                  </ValidationProvider>
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

<script lang="ts">
import { Vue, Component } from "vue-property-decorator";

@Component
export default class Login extends Vue {
  email: string = "";
  password: string = "";
}
</script>

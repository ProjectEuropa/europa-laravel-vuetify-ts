<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" max-width="290">
      <v-card>
        <v-card-title class="headline">{{ delObj.file_name }}を本当に削除しますか？</v-card-title>

        <v-card-text>削除する場合は、削除パスワードを入力してください。</v-card-text>
        <v-card-text>
          <v-text-field
            prepend-icon="mdi-lock"
            :counter="100"
            type="password"
            v-model="deletePassword"
            label="削除パスワード"
            required
          ></v-text-field>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-flex>
            <v-btn class="text-left" color="green darken-1" text @click="close">キャンセル</v-btn>
          </v-flex>

          <v-flex class="text-xs-right">
            <v-btn
              color="red darken-1"
              text
              :loading="loading"
              :disabled="loading"
              @click="exexuteDelete()"
            >削除実行</v-btn>
          </v-flex>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-snackbar v-model="snackbar" :vertical="true">{{ snackbarText }}</v-snackbar>
  </v-row>
</template>

<script lang="ts">
import { TargetDeleteFileObject } from "../../vue-data-entity/TargetDeleteFileObject";
import { Vue, Component, Prop } from "vue-property-decorator";
import { AxiosError, AxiosRequestConfig, AxiosResponse } from "axios";

@Component
export default class DeleteModal extends Vue {
  dialog: boolean = false;
  loading: boolean = false;
  deletePassword: string = "";
  snackbar: boolean = false;
  snackbarText: string = "";
  csrf: string | null = document
    .querySelector('meta[name="csrf-token"]')!
    .getAttribute("content");

  @Prop()
  delObj!: TargetDeleteFileObject;
  /**
   * name
   */
  public open() {
    this.dialog = true;
  }
  /**
   * name
   */
  public close() {
    this.dialog = false;
  }

  /**
   * name
   */
  public exexuteDelete() {
    this.loading = true;
    Vue.prototype.$http
      .post("/api/delete/searchFile", {
        id: this.delObj.id,
        deletePassword: this.deletePassword,
        _token: this.csrf
      })
      .then((res: any): void => {
        this.snackbarText = `${this.delObj.file_name}の削除が完了しました。`;
        this.snackbar = true;
        this.dialog = false;
        setTimeout(() => {
          this.snackbar = false;
          this.$router.go(0);
        }, 2000);
      })
      .catch((err: any): void => {
        this.loading = false;
        this.snackbar = true;
        this.snackbarText = `${this.delObj.file_name}の削除に失敗しました。`;
        setTimeout(() => {
          this.snackbar = false;
        }, 2000);
      });
  }
}
</script>

<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" max-width="290">
      <v-card>
        <v-card-title class="headline">{{delObj}}を本当に削除しますか？</v-card-title>

        <v-card-text>削除する場合は、削除パスワードを入力してください。</v-card-text>
        <v-card-text>
          <v-text-field
            prepend-icon="mdi-lock"
            :counter="100"
            type="password"
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
            <v-btn color="red darken-1" text @click="close">削除実行</v-btn>
          </v-flex>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script lang="ts">
import { Vue, Component, Prop } from "vue-property-decorator";

@Component
export default class DeleteModal extends Vue {
  dialog: boolean = false;

  @Prop()
  delObj!: string;
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
}
</script>

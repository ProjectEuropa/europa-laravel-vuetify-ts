<template>
  <v-content>
    <v-container fluid>
      <h1 class="display-1 mb-4 text--darken-1">Search Team Data</h1>
      <h4 class="subheading">チームデータの検索が可能です</h4>
      <v-form class="d-flex justify-md-space-center justify-sm-space-between">
        <v-text-field label="Solo" placeholder="keyword" solo></v-text-field>
        <v-select :items="items" v-model="itemDefault" solo></v-select>
        <v-btn class="primary">Search</v-btn>
      </v-form>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">ダウンロード</th>
              <th class="text-left">オーナー名</th>
              <th class="text-left">コメント</th>
              <th class="text-left">ファイル名</th>
              <th class="text-left">アップロード日時</th>
              <th class="text-left">削除</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in teams" :key="index">
              <td>
                <v-icon>mdi-cloud-download-outline</v-icon>
              </td>
              <td>{{ item.upload_owner_name }}</td>
              <td style="white-space:pre-wrap; word-wrap:break-word;">{{ item.file_comment }}</td>
              <td>{{ item.file_name }}</td>
              <td>{{ item.created_at }}</td>
              <td>
                <v-icon @click="dialogOpen(item.file_name)">mdi-delete-forever</v-icon>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-pagination v-model="page" class="my-4" :length="15"></v-pagination>
    </v-container>
    <delete-modal ref="dialog" :delObj="delObj"></delete-modal>
  </v-content>
</template>

<script lang="ts">
import { FileDataObject } from "../../vue-data-entity/FileDataObject";
import { SelectBoxTextValueObject } from "../../vue-data-entity/SelectBoxTextValueObject";
import DeleteModal from "../modules/DeleteModal.vue";
import { Vue, Component, Watch } from "vue-property-decorator";

@Component({
  components: {
    DeleteModal
  }
})
export default class SearchTeam extends Vue {
  teams: Array<FileDataObject> = [];
  page: number = 1;
  items: Array<SelectBoxTextValueObject> = [
    {
      text: "投稿日時の新しい順",
      value: "1"
    },
    {
      text: "投稿日時の古い順",
      value: "2"
    }
  ];
  itemDefault: string = "1";
  dialog: boolean = false;
  delObj: string = "";

  $refs!: {
    dialog: DeleteModal;
  };
  /**
   * name
   */
  public dialogOpen(file_name: string) {
    this.delObj = file_name;
    this.$refs.dialog.open();
  }

  /**
   * name
   */
  public created() {
    this.page = isNaN(Number(this.$route.query.page)) ? 1 : Number(this.$route.query.page);
    console.log(this.page);
    Vue.prototype.$http
      .get(`/api/search?page=${this.page}`)
      .then((res: any): void => {
        console.log(res.data.data);
        this.teams = res.data.data;
      });
  }

  /**
   * watch
   */
  @Watch("page")
  onPageChanged() {
    Vue.prototype.$http
      .get(`/api/search?page=${this.page}`)
      .then((res: any): void => {
        console.log(res.data.data);
        this.teams = res.data.data;
      });
  }
}
</script>

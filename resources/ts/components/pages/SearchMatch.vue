<template>
  <v-content>
    <v-container fluid>
      <h1 class="display-1 mb-4 text--darken-1">Search Match Data</h1>
      <h4 class="subheading">マッチデータの検索が可能です</h4>
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
              <td>{{ item.name }}</td>
              <td style="white-space:pre-wrap; word-wrap:break-word;">{{ item.comments }}</td>
              <td>{{ item.file_name }}</td>
              <td>{{ item.date }}</td>
              <td>
                <v-icon>mdi-delete-forever</v-icon>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-pagination v-model="page" class="my-4" :length="15"></v-pagination>
    </v-container>
  </v-content>
</template>

<script lang="ts">
import { FileDataObject } from "../../vue-data-entity/FileDataObject";
import { OrderTextValueObject } from "../../vue-data-entity/OrderTextValueObject";
import { Vue, Component } from "vue-property-decorator";

@Component
export default class SearchMatch extends Vue {
  teams: Array<FileDataObject> = [
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    },
    {
      name: "M2",
      comments: `新春演習大会2019正順`,
      file_name: "TKNHB8.CHE",
      date: new Date("2019-10-19 11:44:30")
    }
  ];
  page: number = 1;
  items: Array<OrderTextValueObject> = [
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
}
</script>
